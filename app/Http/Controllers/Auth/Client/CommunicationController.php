<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommunicationController extends Controller
{
    public function supportTickets()
    {
        $client_id = Auth::user()->username;
        $tickets = DB::table('support_tickets')->where('client_id', $client_id)->get();
        return view('auth.client.communication.support-tickets', compact('tickets'));
    }

    public function contactSupport()
    {
        return view("auth.client.communication.contact-support");
    }

    protected function generateSupportTicketID($prefix = 'SUP')
    {
        // Get the current timestamp
        $timestamp = date('YmdHis'); // Format: YYYYMMDDHHMMSS

        // Generate a random number to make the ID more unique
        $randomNumber = mt_rand(1000, 9999); // 4-digit random number

        // Combine the prefix, timestamp, and random number
        $ticketID = $prefix . '-' . $timestamp . '-' . $randomNumber;

        return $ticketID;
    }

    public function supportTicketStore(Request $request)
    {
        $validtor = Validator::make($request->all(), [
            'ticketSubject' => 'required',
            'ticketDescription' => 'required',
            'ticketPriority' => 'required',
        ]);

        if ($validtor->fails()) {
            return redirect()->back()->withErrors($validtor)->withInput();
        }

        try {
            DB::beginTransaction();
            $clientDetails = Auth::user();
            $ticket_id = $this->generateSupportTicketID();
            $ticketsData = [
                'ticket_id' => $ticket_id,
                'client_id' => $clientDetails->username,
                'name' => $clientDetails->name,
                'ticket_subject' => $request->ticketSubject,
                'description' => $request->ticketDescription,
                'priority' => $request->ticketPriority,
                'ticket_status' => "Open",
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $ticketMessage = [
                'ticket_id' => $ticket_id,
                'client_id' => $clientDetails->username,
                'subject' => $request->ticketSubject,
                'description' => $request->ticketDescription,
                'created_by' => $clientDetails->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $ticketMessage = DB::table('support_ticket_messages')->insert($ticketMessage);

            $ticketResponse = DB::table('support_tickets')->insert($ticketsData);

            if ($ticketResponse && $ticketMessage) {
                DB::commit();
                return redirect()->back()->with('success', "New ticket has been generated successfully!!");
            }

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }
    public function viewSupportTicket($id)
    {
        $support_tickets = DB::table('support_tickets')->where('ticket_id', $id)->first();
        $supportTicketMessage = DB::table('support_ticket_messages')->where('ticket_id', $id)->get();
        return view('auth.client.communication.view-support-ticket', compact('support_tickets', 'supportTicketMessage'));
    }

    public function chatSupportTicketStore(Request $request)
    {

        $checkTicketStatus = DB::table('support_tickets')->where('ticket_id', $request->ticket_id)->first();

        
        if ($checkTicketStatus->ticket_status == "Closed") {
            return redirect()->back()->with('warning', "Sorry your ticket has been closed. kindly create new ticket!!");
        }

        $clientDetails = Auth::user();

        $data = [
            'ticket_id' => $request->ticket_id,
            'client_id' => $request->client_id,
            'subject' => $request->subject,
            'description' => $request->description,
            'created_by' => $clientDetails->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        dd($data);
        $response = DB::table('support_ticket_messages')->insert($data);

        if ($response) {
            return redirect()->back()->with('success', "Response has been sended!!");
        } else {
            return redirect()->back()->with('failed', "Internal server error!!");
        }
    }
}
