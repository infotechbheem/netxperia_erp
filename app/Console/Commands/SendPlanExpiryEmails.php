<?php

namespace App\Console\Commands;

use App\Mail\Client\PlanExpiryNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendPlanExpiryEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:plan-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send plan expiry emails to users whose hosting plans expired yesterday';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $yesterday = Carbon::yesterday();
    
        // Fetch hosting plans that expired yesterday
        $expiredPlans = DB::table('client_hosting_details')->whereDate('plan_expiry_date', $yesterday)->get();
    
        if ($expiredPlans->isEmpty()) {
            $this->info("No plans expired yesterday.");
            return;
        }
    
        foreach ($expiredPlans as $plan) {
            $client_details = DB::table('clients')->where('client_id', $plan->client_id)->first(); // Get the email of the client
    
            if (!$client_details) {
                $this->info("No client found for plan ID {$plan->client_id}");
                continue;
            }
    
            $email = $client_details->email;
    
            try {
                // Send email
                Mail::to($email)->send(new PlanExpiryNotification($plan, $client_details));
    
                $this->info("Email sent to {$email} for expired plan.");
            } catch (\Exception $e) {
                $this->error("Failed to send email to {$email}: " . $e->getMessage());
            }
        }
    }
    
}
