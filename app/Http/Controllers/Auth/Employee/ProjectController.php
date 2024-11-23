<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    protected $emp_id;

    public function __construct() // Change the constructor visibility to public
    {
        // Fetch the employee ID from the authenticated user
        $this->emp_id = Auth::user()->username; // Assuming 'username' is the emp_id, verify this
    }
    public function currentProject()
    {
        $assignProjects = DB::table('emp_assign_projects')->where('emp_id', $this->emp_id)->whereNot('status', 'Completed')->get();

        return view("auth.employee.project.current-project", compact('assignProjects'));
    }

    public function updateCurrentProjectStatus(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:emp_assign_projects,project_id',
            'project_status' => 'required|string|in:In Progress,Completed,On Hold',
            'progress_status' => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
        ]);

        // If validation fails, return a JSON response with error messages
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
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
            $response = DB::table('emp_assign_projects')
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
                'message' => 'Internal server error occurred!',
            ], 500);
        }
    }

    public function completedProject(Request $request)
    {
        $completedProject = DB::table('emp_assign_projects')->where('emp_id', $this->emp_id)->where('status', 'Completed')->where('progress_status', 100)->get();
        return view('auth.employee.project.completed-project', compact('completedProject'));
    }

}
