<?php

namespace App\Http\Controllers\Auth\Admin\Client;

use App\Http\Controllers\Controller;
use App\Mail\Client\SendRegistrationMail;
use App\Models\Client\Client;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::get()->map(function ($client) {
            $client->encrypted_client_id = encrypt($client->client_id);
            return $client;
        });
        return view("auth.admin.client.client", compact('clients'));
    }

    public function registration()
    {
        return view("auth.admin.client.registration");
    }

    public function store(Request $request)
    {
        // Define validation rules
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email',
            'phone_number' => 'required|string|min:10|max:15|regex:/^\d+$/',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'nullable|string|max:255',
            'client_type' => 'required|in:Individual,Company',
            'country' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'preferred_language' => 'nullable|string|max:50',
            'referral_source' => 'nullable|string|max:100',
            'dob' => 'nullable|date',
            'occupation' => 'nullable|string|max:255',
            'tax_identification' => 'nullable|string|max:100',
            'industry' => 'nullable|string|max:255',
            'communication_preferences' => 'required|in:Email,Phone,SMS',
            'terms_conditions' => 'required',
            'marketing_opt_in' => 'nullable',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        try {
            DB::beginTransaction();

            $client_id = generateClientId($request->input('name'));

            // Create new client after validation
            $clientResponse = Client::create([
                'client_id' => $client_id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'company_name' => $request->input('company_name'),
                'client_type' => $request->input('client_type'),
                'country' => $request->input('country'),
                'address' => $request->input('address'),
                'preferred_language' => $request->input('preferred_language'),
                'referral_source' => $request->input('referral_source'),
                'dob' => $request->input('dob'),
                'occupation' => $request->input('occupation'),
                'tax_identification' => $request->input('tax_identification'),
                'industry' => $request->input('industry'),
                'communication_preferences' => $request->input('communication_preferences'),
                'terms_conditions' => $request->input('terms_conditions') == 'on' ? true : false,
                'marketing_opt_in' => $request->input('marketing_opt_in') == 'on' ? true : false,
            ]);

            // Ensure password is hashed
            $client = User::create([
                'username' => $client_id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')), // Hash the password
                'role' => "client",
            ]);

            $client_role = Role::firstOrCreate(['name' => "client"]);
            $client->assignRole($client_role);

            if ($clientResponse && $client) {
                try {
                    $details = [
                        'name' => $request->input('name'),
                        'client_id' => $client_id,
                        'email' => $request->input('email'),
                        'password' => $request->input('password'),
                    ];

                    // Send registration mail
                    Mail::to($request->input('email'))->send(new SendRegistrationMail($details));

                    DB::commit();
                    return redirect()->back()->with('success', "Client Registration has been successful!");
                } catch (\Throwable $th) {
                    // Handle email sending error
                    DB::rollBack();
                    return redirect()->back()->with('failed', "Failed to send confirmation email.");
                }
            }

            dd("asdf");
            return redirect()->back()->with('failed', "Failed to create client. Please try again.");
        } catch (Exception $e) {

            dd($e);
            return redirect()->back()->with('failed', "Internal server error: " . $e->getMessage());
        }
    }

    public function profile($id)
    {

        $client_id = Crypt::decrypt($id);

        $client = Client::where('client_id', $client_id)->first();

        return view('auth.admin.client.client-profile-view', compact('client'));
    }
    public function supportTicket()
    {
        return view("auth.admin.client.support-ticket");
    }
}
