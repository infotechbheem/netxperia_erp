<?php

namespace App\Http\Controllers\Auth\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    protected $vendor_id;

    public function __construct() // Change the constructor visibility to public
    {
        // Fetch the employee ID from the authenticated user
        $this->vendor_id = Auth::user()->username; // Assuming 'username' is the emp_id, verify this
    }

    public function currentProject()
    {
        $assignProjects = DB::table('vendor_assign_project')->where('vendor_id', $this->vendor_id)->whereNot('status', 'Completed')->get();
        return view('auth.vendor.project.current-project', compact('assignProjects'));
    }

    public function updateProjectDetails(Request $request)
    {
        // dd($request->all());

        // Validate the input
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:vendor_assign_project,project_id',
            'project_status' => 'required|string|in:In Progress,Completed,On Hold',
            'progress_status' => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
        ]);

        // If validation fails, return a JSON response with error messages
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Prepare data to update
            $projectDataUpdated = [
                'status' => $request->input('project_status'),
                'progress_status' => $request->input('progress_status'),
                'project_description' => $request->input('description'),
                'updated_at' => now(),
            ];

            // Update project data in the database
            $response = DB::table('vendor_assign_project')
                ->where('project_id', $request->input('project_id'))
                ->update($projectDataUpdated);

            if ($response) {
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Project data has been updated successfully!',
                ], 200);
            } else {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to update the project.',
                ], 500);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function completedProject(Request $request)
    {
        $completedProject = DB::table('vendor_assign_project')->where('vendor_id', $this->vendor_id)->where('status', 'Completed')->where('progress_status', 100)->get();
        return view('auth.vendor.project.completed-project', compact('completedProject'));
    }

    public function sendProject()
    {
        $completedProject = DB::table('vendor_assign_project')->where('vendor_id', $this->vendor_id)->where('status', 'Completed')->where('progress_status', 100)->get();
        return view('auth.vendor.project.send-project', compact('completedProject'));
    }

    public function stoerSendProject(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'message' => 'nullable',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx', // Validate file types and sizes
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            DB::beginTransaction();

            $vendor_id = Auth::user()->username;

            // Handle the document uploads (store both file name and path)
            $documentData = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $document) {
                    // Store each file and get the file path
                    $path = $document->store('completed_project_files', 'public'); // Save to 'storage/app/public/documents'

                    // Store the original document name and its storage path
                    $documentData[] = [
                        'name' => $document->getClientOriginalName(),
                        'path' => $path,
                    ];
                }
            }

            // Convert the document data array to JSON for storing in the database
            $attached_files = json_encode($documentData);

            $sendProjectData = [
                'vendor_id' => $vendor_id,
                'project_id' => $request->project_id,
                'project_description' => $request->message,
                'attach_file' => $attached_files,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $response = DB::table('vendor_sended_projects')->insert($sendProjectData);

            if ($response) {
                DB::commit();
                return redirect()->back()->with('success', "Project has been sended successfully!!");
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function completedSendedProject()
    {
        $vendor_id = Auth::user()->username;
        $completedProjects = DB::table('vendor_assign_project')
            ->join('vendor_sended_projects', 'vendor_assign_project.project_id', '=', 'vendor_sended_projects.project_id')
            ->where('vendor_sended_projects.vendor_id', $vendor_id)
            ->select('vendor_sended_projects.*', 'vendor_assign_project.project_title', 'vendor_assign_project.status')
            ->get();
        // dd($completedProjects);
        return view('auth.vendor.project.complete-sended-project', compact('completedProjects'));
    }

    public function viewSendedProject($id){
        $ProjectDetails = DB::table('vendor_assign_project')
            ->join('vendor_sended_projects', 'vendor_assign_project.project_id', '=', 'vendor_sended_projects.project_id')
            ->where('vendor_sended_projects.id', $id)
            ->select('vendor_sended_projects.*', 'vendor_assign_project.project_title', 'vendor_assign_project.status')
            ->first();
            // dd($ProjectDetails);
        return view('auth.vendor.project.view-sended-project', compact('ProjectDetails'));
    }
}
