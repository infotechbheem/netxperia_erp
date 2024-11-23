<?php

namespace App\Http\Controllers\Auth\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunicationController extends Controller
{
    public function supportTickets()
    {
        $tickets = DB::table('support_tickets')->get();
        return view('auth.admin.client.communication.support-tickets', compact('tickets'));
    }

    public function viewSupportTicket($id)
    {
        $support_tickets = DB::table('support_tickets')->where('ticket_id', $id)->first();
        $supportTicketMessage = DB::table('support_ticket_messages')->where('ticket_id', $id)->get();
        return view('auth.admin.client.communication.view-support-tickets', compact('support_tickets', 'supportTicketMessage'));
    }

    public function supportTicketResponseStore(Request $request)
    {
        $data = [
            'ticket_id' => $request->ticket_id,
            'client_id' => $request->client_id,
            'subject' => $request->subject,
            'description' => $request->description,
            'created_by' => "Admin",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $response = DB::table('support_ticket_messages')->insert($data);

        if ($response) {
            return redirect()->back()->with('success', "Response has been sended!!");
        } else {
            return redirect()->back()->with('failed', "Internal server error!!");
        }
    }

    public function changeTicketStatus(Request $request)
    {
        $response = DB::table('support_tickets')->where('ticket_id', $request->ticket_id)->update(['ticket_status' => $request->ticket_status]);

        if ($response) {
            return redirect()->back()->with('success', "Ticket status has been change successfully!!");
        }
    }
}
