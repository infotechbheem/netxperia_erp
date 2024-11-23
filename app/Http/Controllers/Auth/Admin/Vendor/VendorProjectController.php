<?php

namespace App\Http\Controllers\Auth\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Employee\Department;
use App\Models\Employee\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendorProjectController extends Controller
{
    public function currentProject()
    {
        // Fetch all projects
        $projects = Project::all()->map(function ($project) {
            // Encrypt each project's id
            $project->encrypted_project_id = Crypt::encryptString($project->project_id);
            return $project;
        });

        $assignetProject = Project::where('projects_assigned', false)->get();

        $vendors = DB::table('vendors')->get();
        return view('auth.admin.vendor.project.current-project', compact('projects', 'assignetProject', 'vendors'));
    }

    public function storeAssignProject(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'vendor_id' => 'required',
            'project_name' => 'required',
            'project_category' => 'required',
            'start_date' => 'required|date',
            'expected_completion' => 'required|date|after_or_equal:start_date', // Ensure the expected completion is after the start date
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Begin database transaction
            DB::beginTransaction();

            // Prepare data for insertion
            $data = [
                'vendor_id' => $request->vendor_id,
                'project_id' => $request->project_id,
                'project_title' => $request->project_name,
                'project_category' => $request->project_category,
                'assign_date_time' => $request->start_date,
                'deadlines' => $request->expected_completion,
                'status' => "Initialized",
                'progress_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert data into emp_assign_projects table
            $response = DB::table('vendor_assign_project')->insert($data);

            // Update the projects table
            $updateResponse = DB::table('projects')->where('project_id', $request->project_id)->update(['projects_assigned' => true]);

            // Check if both insert and update were successful
            if ($response && $updateResponse) {
                DB::commit(); // Commit the transaction
                return redirect()->back()->with('success', 'Project assigned successfully!!');
            } else {
                DB::rollBack(); // Rollback if insert or update fails
                return redirect()->back()->with('failed', 'Failed to assign project. Please try again.');
            }
        } catch (\Throwable $th) {
            // Rollback on exception
            DB::rollBack();
            // Log the error for debugging
            return redirect()->back()->with('failed', 'Internal server error: ' . $th->getMessage());
        }
    }

    public function AssignedProject()
    {
        $departments = Department::get();
        $assignedProjects = DB::table('vendor_assign_project')->get();
        return view('auth.admin.vendor.project.assigned-project', compact('departments', 'assignedProjects'));
    }

    public function getProjectDetails($id)
    {
        // Fetch the project details
        $project = DB::table('vendor_assign_project')->where('project_id', $id)->first();

        // Check if project exists
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        // Fetch the employee name associated with the project
        $vendor = DB::table('vendors')->where('vendor_id', $project->vendor_id)->first();

        // Return project details along with employee name
        return response()->json([
            'project_id' => $project->project_id,
            'project_title' => $project->project_title,
            'project_category' => $project->project_category,
            'assign_date_time' => $project->assign_date_time,
            'deadlines' => $project->deadlines,
            'status' => $project->status,
            'progress_status' => $project->progress_status,
            'last_updated_at' => $project->updated_at,
            'project_description' => $project->project_description,
            'vendor_id' => $project->vendor_id,
            'description' => $project->project_description,
            'vendor_name' => $vendor->company_name, // Adjust to your field name for employee name
            'designation' => $vendor->designation,
        ]);
    }

    public function completedProject()
    {
        $completedProjects = DB::table('vendor_assign_project')
            ->join('vendor_sended_projects', 'vendor_assign_project.project_id', '=', 'vendor_sended_projects.project_id')
            ->join('vendors', 'vendor_sended_projects.vendor_id', '=', 'vendors.vendor_id')
            ->select(
                'vendor_sended_projects.*',
                'vendor_assign_project.project_title',
                'vendor_assign_project.status',
                'vendor_assign_project.project_category',
                'vendors.company_name as vendor_name',
            )
            ->get();
        // dd($completedProjects);
        return view('auth.admin.vendor.project.completed-project', compact('completedProjects'));
    }

    public function viewVendorcompletedProject($id)
    {
        $ProjectDetails = DB::table('vendor_assign_project')
            ->join('vendor_sended_projects', 'vendor_assign_project.project_id', '=', 'vendor_sended_projects.project_id')
            ->where('vendor_sended_projects.id', $id)
            ->select('vendor_sended_projects.*', 'vendor_assign_project.project_title', 'vendor_assign_project.status')
            ->first();
        // dd($ProjectDetails);
        return view('auth.admin.vendor.project.view-completed-project', compact('ProjectDetails'));
    }
}
