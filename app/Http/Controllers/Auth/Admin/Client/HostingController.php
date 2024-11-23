<?php

namespace App\Http\Controllers\Auth\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HostingController extends Controller
{
    public function hostingDetails()
    {
        // Fetch the joined data from clients and client_hosting_details tables
        $clientHostingDetails = DB::table('clients')
            ->join('client_hosting_details', 'clients.client_id', '=', 'client_hosting_details.client_id')
            ->select(
                'clients.*',
                'client_hosting_details.hosting_provider',
                'client_hosting_details.plan_name',
                'client_hosting_details.plan_purchased_date',
                'client_hosting_details.plan_expiry_date',
                'client_hosting_details.amount_paid',
                'client_hosting_details.additional_notes'

            )
            ->get();
        // Pass the data to the view
        return view('auth.admin.client.hosting.hosting-details-view', compact('clientHostingDetails'));
    }

    public function addHostingDetails()
    {
        $clients = Client::all();
        return view('auth.admin.client.hosting.add-hosting-details', compact('clients'));
    }

    public function saveHostingDetails(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|exists:clients,client_id',
            'hosting_provider' => 'required|string|max:255',
            'plan_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|',
        ]);

        if ($validator->fails()) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $checkClientDetails = DB::table('client_hosting_details')->where('client_id', $request->client_id)->exists();

        if ($checkClientDetails) {
            return redirect()->back()->with('failed', 'This client is already exist in our database!!');
        }

        try {
            DB::beginTransaction();
            // Fetch client name from the database
            $clientName = DB::table('clients')->where('client_id', $request->client_id)->value('name');

            // Prepare hosting details for insertion
            $hostingData = [
                'client_id' => $request->client_id,
                'client_name' => $clientName,
                'hosting_provider' => $request->hosting_provider,
                'plan_name' => $request->plan_name,
                'plan_purchased_date' => $request->start_date,
                'plan_expiry_date' => $request->end_date,
                'amount_paid' => $request->amount,
                'additional_notes' => $request->notes,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $renewHostingData = [
                'client_id' => $request->client_id,
                'expiry_date' => $request->end_date,
                'amount' => $request->amount,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert data into hosting renewal details

            $response1 = DB::table('client_hosting_renewal_details')->insert($renewHostingData);

            // Insert data into hosting_details table
            $response2 = DB::table('client_hosting_details')->insert($hostingData);

            if ($response1 && $response2) {
                DB::commit();
                // Redirect with success message
                return redirect()->back()->with('success', 'Hosting details saved successfully.');
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            // Handle any exceptions and redirect back with error message
            return redirect()->back()->with('failed', 'An error occurred while saving hosting details.' . $th->getMessage());
        }
    }

    public function renewalHostingPlan(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'client_id' => $request->client_id,
                'expiry_date' => $request->expiry_date,
                'amount' => $request->amount,
                'remarks' => $request->remarks,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $dbResponse = DB::table('client_hosting_renewal_details')->insert($data);
            $dbUpdateResponse = DB::table('client_hosting_details')->where('client_id', $request->client_id)->update([
                'plan_expiry_date' => $request->expiry_date,
                'amount_paid' => $request->amount,
                'updated_at' => now(),
            ]);

            if ($dbResponse && $dbUpdateResponse) {
                DB::commit();
                return redirect()->back()->with('success', "Plan has been renewed");
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function viewHostingDetails($id)
    {
        $clientHostingDetails = DB::table('client_hosting_details')
            ->join('clients', 'client_hosting_details.client_id', '=', 'clients.client_id') // Use 'clients' table correctly
            ->select('clients.*', 'client_hosting_details.*') // Use proper column selection
            ->where('client_hosting_details.client_id', $id) // Match the correct column from the `client_hosting_details` table
            ->first();

        $renewallog = DB::table('client_hosting_renewal_details')->where('client_id', $id)->get();
        return view('auth.admin.client.hosting.view-hosting-details', compact('clientHostingDetails', 'renewallog'));
    }

}
