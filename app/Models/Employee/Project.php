<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // Project Details
        'project_id',
        'username',
        'project_title',
        'project_category',
        'project_budget',
        'project_description',
        'project_deadline',
        'project_created_by',
        'project_image',

        // Client Information
        'client_name',
        'client_email',
        'client_phone',
        'client_requirements',

        // Project Timeline
        'start_date',
        'end_date',
        'milestones',

        // Resources
        'team_members',
        'technologies',
        'resource_budget',
    ];
}
