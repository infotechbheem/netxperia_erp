<?php

namespace App\Http\Controllers\Auth\Admin\Client;

use App\Http\Controllers\Controller;
use function Laravel\Prompts\select;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function currentProject()
    {
        $projects = DB::table('client_projects')
            ->join('clients', 'client_projects.client_id', '=', 'clients.client_id') // Corrected join syntax
            ->select('client_projects.*', 'clients.name', 'clients.phone_number')
            ->get();

        // dd($projects);

        return view('auth.admin.client.project.current-project', compact('projects'));
    }
    public function requestedProject()
    {
        $assignetProject = DB::table('client_projects')->where('projects_assigned', false)->get();

        $employees = DB::table('emp_personal_details')
            ->join('emp_employment_details', 'emp_personal_details.emp_id', '=', 'emp_employment_details.emp_id')
            ->select('emp_personal_details.*', 'emp_employment_details.*')
            ->get();

        $requestProject = DB::table('client_projects')
            ->join('clients', 'client_projects.client_id', '=', 'clients.client_id')
            ->select('client_projects.*', 'clients.name as client_name', 'clients.email as client_email', 'clients.phone_number as client_phone_number')
            ->get();

        $vendors = DB::table('vendors')->get();
        // dd($requestProject);

        return view("auth.admin.client.project.requested-project", compact('requestProject', 'employees', 'assignetProject', 'vendors'));
    }

    public function clientStoreAssignProject(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'employee_id' => 'required',
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
                'emp_id' => $request->employee_id,
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

            $vendorAssignData = [
                'vendor_id' => $request->employee_id,
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

            if ($this->isEmp($request->employee_id) == 'employee') {
                // Insert data into emp_assign_projects table
                $response = DB::table('emp_assign_projects')->insert($data);

                // Update the projects table
                $updateResponse = DB::table('client_projects')->where('project_id', $request->project_id)->update(['projects_assigned' => true]);

                // Check if both insert and update were successful
                if ($response && $updateResponse) {
                    DB::commit(); // Commit the transaction
                    return redirect()->back()->with('success', 'Project assigned successfully!!');
                } else {
                    DB::rollBack(); // Rollback if insert or update fails
                    return redirect()->back()->with('failed', 'Failed to assign project. Please try again.');
                }
            } else {
                $vendorResponse = DB::table('vendor_assign_project')->insert($vendorAssignData);

                // Update the projects table
                $updateResponse = DB::table('client_projects')->where('project_id', $request->project_id)->update(['projects_assigned' => true]);

                // Check if both insert and update were successful
                if ($vendorResponse && $updateResponse) {
                    DB::commit(); // Commit the transaction
                    return redirect()->back()->with('success', 'Project assigned successfully!!');
                } else {
                    DB::rollBack(); // Rollback if insert or update fails
                    return redirect()->back()->with('failed', 'Failed to assign project. Please try again.');
                }
            }

        } catch (\Throwable $th) {
            // Rollback on exception
            DB::rollBack();
            // Log the error for debugging
            return redirect()->back()->with('failed', 'Internal server error: ' . $th->getMessage());
        }
    }

    private function isEmp($id)
    {
        $getRole = DB::table('users')->where('id', 'username')->value('role');
        return $getRole;
    }

    public function viewRequestedProject($id)
    {
        // Fetch the project details by project ID
        $project = DB::table('client_projects')->where('project_id', $id)->first();

        // Decode the documents JSON if it's stored as JSON
        if ($project && isset($project->documents)) {
            $project->documents = json_decode($project->documents, true); // Decoding to an associative array
        }

        return view('auth.admin.client.project.view-requested-project', compact('project'));
    }
    

    public function completedProject(){
        // $client_
        return view('auth.admin.client.project.completed-project');
    }

}
