<?php

use App\Models\Employee\Project;
use Illuminate\Support\Str;

if (!function_exists('generateProjectId')) {
    function generateProjectId()
    {
        // Get the current date (optional)
        $date = now()->format('Ymd'); // Example: 20241007 (YYYYMMDD)

        // Generate a random string or number for uniqueness
        $randomString = strtoupper(Str::random(6)); // Example: AB12XY

        // Combine the date and random string to form the project ID
        $projectId = 'PRJ-' . $date . '-' . $randomString; // Example: PRJ-20241007-AB12XY

        // Ensure the Project ID is unique by checking against the database
        while (Project::where('project_id', $projectId)->exists()) {
            // Regenerate if the ID is already in use
            $randomString = strtoupper(Str::random(6));
            $projectId = 'PRJ-' . $date . '-' . $randomString;
        }
        return $projectId;
    }
}

if (!function_exists('clientProjectId')) {
    function clientProjectId()
    {
        // Combine current timestamp with a random number to ensure uniqueness
        $timestamp = now()->timestamp;
        $randomNumber = rand(1000, 9999);
        return 'PROJ-' . $timestamp . '-' . $randomNumber;
    }
}
