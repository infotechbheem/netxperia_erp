<?php

namespace App\Http\Controllers\Auth\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Mail\Vendor\SendRegistrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Throwable;

class VendorRegistration extends Controller
{
    public function index()
    {
        $vendors = DB::table('vendors')
            ->join('users', 'vendors.vendor_id', '=', 'users.username')
            ->select('vendors.*')
            ->get();

        // Encrypt vendor_id for each vendor
        $vendors->map(function ($vendor) {
            $vendor->encrypted_vendor_id = Crypt::encrypt($vendor->vendor_id);
            return $vendor;
        });

        // Pass the encrypted vendor_id to the view
        return view('auth.admin.vendor.view-profile', compact('vendors'));

    }

    public function vendorRegistration()
    {
        return view('auth.admin.vendor.vendor-registration');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email_address' => 'required|email',
            'website_url' => 'nullable|url',
            'business_type' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'year_established' => 'required|integer',
            'office_address' => 'required|string|max:255',
            'service_areas' => 'nullable|string|max:255',
            'company_profile' => 'nullable|string',
            'specialization' => 'nullable|string|max:255',
            'certifications' => 'nullable|string|max:255',
            'key_personnel' => 'nullable|string',
            'bank_account' => 'required|string|max:255',
            'annual_turnover' => 'required|numeric',
            'credit_references' => 'nullable|string',
            'insurance_details' => 'nullable|string|max:255',
            'compliance_certificates' => 'nullable|string|max:255',
            'tax_compliance' => 'nullable|string|max:255',
            'client_references' => 'required|string',
            'past_projects' => 'nullable|string',
            'payment_terms' => 'required|string',
            'contract_obligations' => 'nullable|string',
            'confidentiality_agreements' => 'nullable|string',
            'additional_services' => 'nullable|string',
            'availability' => 'nullable|string|max:255',
            'communication_method' => 'nullable|string|max:255',
            'profile_image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            DB::beginTransaction();

            $getVendorEmail = DB::table('vendors')->where('email_address', $request->input('email_address'))->exists();

            if ($getVendorEmail) {
                return redirect()->back()->with('failed', 'Sorry you can not regstered with this email id, kindly use another email for registration!!');
            }

            $profile_image = base64_encode(file_get_contents($request->file('profile_image')->getRealPath()));

            $vendor_id = generateEmployeeId($request->input('company_name'));

            // Prepare data for storage
            $data = [
                'vendor_id' => $vendor_id,
                'company_name' => $request->input('company_name'),
                'contact_person' => $request->input('contact_person'),
                'designation' => $request->input('designation'),
                'phone_number' => $request->input('phone_number'),
                'email_address' => $request->input('email_address'),
                'website_url' => $request->input('website_url'),
                'business_type' => $request->input('business_type'),
                'registration_number' => $request->input('registration_number'),
                'year_established' => $request->input('year_established'),
                'office_address' => $request->input('office_address'),
                'service_areas' => $request->input('service_areas'),
                'company_profile' => $request->input('company_profile'),
                'specialization' => $request->input('specialization'),
                'certifications' => $request->input('certifications'),
                'key_personnel' => $request->input('key_personnel'),
                'bank_account' => $request->input('bank_account'),
                'annual_turnover' => $request->input('annual_turnover'),
                'credit_references' => $request->input('credit_references'),
                'insurance_details' => $request->input('insurance_details'),
                'compliance_certificates' => $request->input('compliance_certificates'),
                'tax_compliance' => $request->input('tax_compliance'),
                'client_references' => $request->input('client_references'),
                'past_projects' => $request->input('past_projects'),
                'payment_terms' => $request->input('payment_terms'),
                'contract_obligations' => $request->input('contract_obligations'),
                'confidentiality_agreements' => $request->input('confidentiality_agreements'),
                'additional_services' => $request->input('additional_services'),
                'availability' => $request->input('availability'),
                'profile_image' => $profile_image,
                'communication_method' => $request->input('communication_method'),
            ];

            $vendor_response = DB::table('vendors')->insert($data);

            // Ensure password is hashed
            $vendor = User::create([
                'username' => $vendor_id,
                'name' => $request->input('company_name'),
                'email' => $request->input('email_address'),
                'password' => Hash::make('password'), // Hash the password
                'role' => "vendor",
            ]);

            $vendor_role = Role::firstOrCreate(['name' => "vendor"]);
            $vendor->assignRole($vendor_role);

            if ($vendor && $vendor_response && $vendor) {

                try {
                    // Send the OTP via email
                    $details = [
                        'vendor_name' => $request->input('company_name'),
                        'vendor_id' => $vendor_id,
                        'vendor_password' => "password",
                    ];
                    $mailResponse = Mail::to($request->input('email_address'))->send(new SendRegistrationMail($details)); // Ensure you've set up the OtpMail Mailable

                    if ($mailResponse) {
                        DB::commit();
                        return redirect()->back()->with('success', "Vendor Registration has been successfull!!");
                    }

                } catch (Throwable $th) {
                    DB::rollBack();
                    return redirect()->back()->with('failed', $th->getMessage());

                }
            } else {
                DB::rollBack();
                return redirect()->back()->with('failed', "Internal Server Error!!");
            }
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }

    public function vendorProfile($id)
    {
        $vendor_id = Crypt::decrypt($id);

        $vendor = DB::table('vendors')->where('vendor_id', $vendor_id)->first();

        return view("auth.admin.vendor.vendor-profile", compact('vendor'));
    }
}
