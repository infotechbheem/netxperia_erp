<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function createNewProject()
    {
        $categories = DB::table('project_categories')->get();
        return view('auth.client.project.create-new-project', compact('categories'));
    }

    public function projectStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'budget' => 'required|numeric',
            'priority' => 'required|in:low,medium,high',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Adjust size as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $client_project_id = clientProjectId();
            $client_id = Auth::user()->username;

            // Handle the document uploads (store both file name and path)
            $documentData = [];
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $document) {
                    // Store each file and get the file path
                    $path = $document->store('documents', 'public'); // Save to 'storage/app/public/documents'

                    // Store the original document name and its storage path
                    $documentData[] = [
                        'name' => $document->getClientOriginalName(),
                        'path' => $path,
                    ];
                }
            }

            // Convert the document data array to JSON for storing in the database
            $documentJson = json_encode($documentData);

            $response = Project::create([
                'project_id' => $client_project_id,
                'client_id' => $client_id,
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'budget' => $request->budget,
                'priority' => $request->priority,
                'documents' => $documentJson, // Store document data (names and paths) as JSON
            ]);

            if ($response) {
                DB::commit();
                return redirect()->back()->with('success', "Project has been created successfully!!");
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', "Internal server error: " . $th->getMessage());
        }
    }
    public function currentProject()
    {

        $client_id = Auth::user()->username;
        $projects = Project::where('client_id', $client_id)->where('project_status', '<', 4)->get();
        return view("auth.client.project.current-project", compact('projects'));
    }

    public function completedProject()
    {
        $client_id = Auth::user()->username;
        $projects = Project::where('client_id', $client_id)->where('project_status', '=', 4)->get();
        return view('auth.client.project.completed-project', compact('projects'));
    }

}
