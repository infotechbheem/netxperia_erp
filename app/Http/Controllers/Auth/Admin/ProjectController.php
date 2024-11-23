<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee\Department;
use App\Models\Employee\Project;
use App\Models\Employee\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function empProject()
    {
        $departments = Department::get();
        $assignedProjects = DB::table('emp_assign_projects')->get();
        // In your controller method
        return view('auth.admin.employee.project.project-assigned', compact('departments', 'assignedProjects'));
    }

    public function empProjectCategory()
    {
        $projectCategories = ProjectCategory::get();
        return view("auth.admin.employee.project.emp-project-category", compact('projectCategories'));
    }

    public function empProjectCategoryCreate(Request $request)
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                'project_category' => 'required',
            ]);

            // If validation fails, redirect back with errors and input data
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $check = DB::table('project_categories')->where('category', $request->project_category)->exists();
            if ($check) {
                return redirect()->back()->with('warning', "Project category all ready created!!");
            }

            // Create new project category
            $project_category = new ProjectCategory();
            $project_category->category = $request->input('project_category');
            $project_category->save();

            // Check if project category saved successfully
            if ($project_category) {
                return redirect()->back()->with('success', 'Project Category Created Successfully!');
            }

        } catch (\Throwable $th) {
            // Catch any exceptions and redirect back with the error message
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function empProjectCategoryDelete($category)
    {
        $response = ProjectCategory::where('category', $category)->delete();

        if ($response) {
            return redirect()->back()->with('success', "Project Category Deleted Successfully!!");
        } else {
            return redirect()->back()->with('failed', "Internal server error!!");
        }
    }

    public function empCreateItProject()
    {
        $Categories = ProjectCategory::get();
        return view('auth.admin.employee.project.emp-create-it-project', compact('Categories'));
    }

    public function storeProject(Request $request)
    {
        try {
            DB::beginTransaction();
            // Validate the incoming request
            $validated = $request->validate([
                'project_title' => 'nullable|string|max:255',
                'project_category' => 'nullable|string',
                'project_budget' => 'nullable|numeric',
                'project_description' => 'nullable|string',
                'project_deadline' => 'nullable|date',
                'project_created_by' => 'nullable|string|max:255',
                'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                // Client Information
                'client_name' => 'nullable|string|max:255',
                'client_email' => 'nullable|email|max:255',
                'client_phone' => 'nullable|string|max:15',
                'client_requirements' => 'nullable|string',

                // Project Timeline
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'milestones' => 'nullable|string',

                // Resources
                'team_members' => 'nullable|string',
                'technologies' => 'nullable|string',
                'resource_budget' => 'nullable|numeric',
            ]);

            // If a project image is uploaded, save the file
            if ($request->hasFile('project_image')) {
                $projectImageData = base64_encode(file_get_contents($request->file('project_image')->getRealPath()));
            } else {
                $projectImageData = null;
            }

            $project_id = generateProjectId();
            $auth_user = Auth::user();
            $username = $auth_user->username;
            // Create the project using the validated data

            $project = Project::create([
                'project_id' => $project_id,
                'username' => $username,
                'project_title' => $validated['project_title'],
                'project_category' => $validated['project_category'],
                'project_budget' => $validated['project_budget'],
                'project_description' => $validated['project_description'],
                'project_deadline' => $validated['project_deadline'],
                'project_created_by' => $validated['project_created_by'],
                'project_image' => $projectImageData,

                // Client Information
                'client_name' => $validated['client_name'],
                'client_email' => $validated['client_email'],
                'client_phone' => $validated['client_phone'],
                'client_requirements' => $validated['client_requirements'],

                // Project Timeline
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'milestones' => $validated['milestones'],

                // Resources
                'team_members' => $validated['team_members'],
                'technologies' => $validated['technologies'],
                'resource_budget' => $validated['resource_budget'],
            ]);

            if ($project) {
                DB::commit();
                // Redirect or respond back to the user
                return redirect()->back()->with('success', 'Project created successfully!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }

    }

    public function allRequestedProject()
    {
        // Fetch all projects
        $projects = Project::all()->map(function ($project) {
            // Encrypt each project's id
            $project->encrypted_project_id = Crypt::encryptString($project->project_id);
            return $project;
        });

        $assignetProject = Project::where('projects_assigned', false)->get();

        $employees = DB::table('emp_personal_details')
            ->join('emp_employment_details', 'emp_personal_details.emp_id', '=', 'emp_employment_details.emp_id')
            ->select('emp_personal_details.*', 'emp_employment_details.*')
            ->get();

        return view("auth.admin.employee.project.emp-all-requested-project", compact('projects', 'employees', 'assignetProject'));
    }

    public function storeAssignProject(Request $request)
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

            // Insert data into emp_assign_projects table
            $response = DB::table('emp_assign_projects')->insert($data);

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

    public function projectView($id)
    {
        // Decrypt the project id
        $decryptedId = Crypt::decryptString($id);

        // Continue with the logic, for example fetching the project
        $project = Project::where('project_id', $decryptedId)->first();
        // dd($project);
        return view("auth.admin.employee.project.emp-view-project", compact('project'));
    }

    public function getEmployee(Request $request)
    {
        $department = $request->department;

        $employees = DB::table('emp_personal_details')
            ->join('users', 'emp_personal_details.emp_id', '=', 'users.username')
            ->where('users.department', $department)
            ->select('emp_personal_details.*', 'users.*')
            ->get();
        // Return employees as JSON
        return response()->json($employees);
    }

    public function getProjectDetails($id)
    {
        // Fetch the project details
        $project = DB::table('emp_assign_projects')->where('project_id', $id)->first();

        // Check if project exists
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        // Fetch the employee name associated with the project
        $employee = DB::table('emp_personal_details')->where('emp_id', $project->emp_id)->first();

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
            'emp_id' => $project->emp_id,
            'description' => $project->project_description,
            'employee_name' => $employee->name, // Adjust to your field name for employee name
        ]);
    }

}
