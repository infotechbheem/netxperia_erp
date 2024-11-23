<?php

namespace App\Http\Controllers\Auth\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {
        // Fetch projects with client details for each project
        $projects = DB::table('client_projects')
            ->join('clients', 'client_projects.client_id', '=', 'clients.client_id')
            ->where('project_status', 4)
            ->select('client_projects.*', 'clients.name as client_name', 'clients.email as client_email') // Add other client fields as needed
            ->get();

        $invoice = DB::table('invoices')->get();

        return view('auth.admin.client.invoice.generate-invoice', compact('projects', 'invoice'));
    }
    public function projectInvoiceGenerate($project_id, $client_id)
    {
        // dd($project_id, $client_id);
        $invoiceDetails = DB::table('client_projects')
            ->join('clients', 'client_projects.client_id', '=', 'clients.client_id')
            ->where('project_status', 4)
            ->where('clients.client_id', $client_id) // Corrected alias here
            ->where('client_projects.project_id', $project_id)
            ->select('client_projects.*', 'clients.name as client_name', 'clients.phone_number as client_phone_number', 'clients.email as client_email', 'clients.address as client_address') // Add other client fields as needed
            ->first();

        return view('auth.admin.client.invoice.project-invoice-generate', compact('invoiceDetails'));

    }

    private function generateInvoiceId()
    {
        // Generate a unique invoice ID
        return 'INV-' . strtoupper(uniqid()) . '-' . date('Y');
    }

    public function invoiceStore(Request $request)
    {
        try {
            $invoiceData = [
                'invoice_id' => $this->generateInvoiceId(),
                'project_id' => $request->project_id,
                'project_title' => $request->title,
                'client_name' => $request->client_name,
                'client_id' => $request->client_id,
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'services' => json_encode($request->service_name),
                'descriptions' => json_encode($request->service_description),
                'amount' => json_encode($request->total_amount),
                'discount' => $request->discount ?? 0, // Default to 0 if not provided
                'tax' => $request->tax ?? 0, // Default to 0 if not provided
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $invoiceResponse = DB::table('invoices')->insert($invoiceData);

            if ($invoiceResponse) {
                return redirect()->back()->with('success', "Invoice Generated Successfully!");
            } else {
                return redirect()->back()->with('failed', "Failed to generate the invoice.");
            }
        } catch (\Throwable $th) {
            // Consider logging the error if not done already
            return redirect()->back()->with('failed', "An error occurred: " . $th->getMessage());
        }
    }

    public function viewInvoice()
    {
        $invoices = DB::table('invoices')->get();
        return view('auth.admin.client.invoice.view-invoice', compact('invoices'));
    }

    public function projectViewInvoice($id)
    {
        $invoice = DB::table('invoices')->where('id', $id)->first();
        return view('auth.admin.client.invoice.project-view-invoice', compact('invoice'));
    }

}
