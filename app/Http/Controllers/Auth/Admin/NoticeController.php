<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function noticeBoard()
    {
        $notices = Notice::get();
        return view("auth.admin.notice-board", compact('notices'));
    }

    public function storeNotice(Request $request)
    {
        try {
            DB::beginTransaction();
            // Validate the request data
            $validatedData = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'flashing_start' => 'required|date',
                'flashing_ending' => 'required|date',
                'notice_status' => 'required|string',
                'regards_by' => 'required|string',
            ]);

            // Generate a unique notice ID
            $validatedData['notice_id'] = Notice::generateNoticeId();

            // Create a new notice
            $response = Notice::create($validatedData);

            if ($response) {
                DB::commit();
                return redirect()->back()->with('success', "Notice created successfully!");
            }
            DB::rollBack();
            return redirect()->back()->with('failed', "Internal server error");

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', 'Internal serve error' . $th->getMessage());
        }

    }
}
