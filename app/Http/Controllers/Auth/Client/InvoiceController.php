<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function viewInvoice()
    {
        $client_id = Auth::user()->username;
        $invoices = DB::table('invoices')->where('client_id', $client_id)->get();

        return view('auth.client.invoice.view-invoice', compact('invoices'));
    }

    public function generateInvoice()
    {
        return view('auth.client.invoice.generate-invoice');
    }

    public function paymentHistory()
    {
        return view('auth.client.invoice.payment-history');
    }

    public function viewProjectInvoice($id)
    {
        $invoice = DB::table('invoices')->where('id', $id)->first();
        return view('auth.client.invoice.view-project-invoice', compact('invoice'));
    }

    public function downloadInvoice($id)
    {
        // Fetch the invoice from the database
        $invoice = DB::table('invoices')->where('id', $id)->first();

        if (!$invoice) {
            return back()->with('error', 'Invoice not found.');
        }

        // Load the Blade view and pass in the invoice data
        $pdf = Pdf::loadView('auth.client.invoice.download-invoice', compact('invoice'));

        // Return the generated PDF for download
        return $pdf->download('invoice_' . $invoice->invoice_id . '.pdf');
    }
}
