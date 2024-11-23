<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "client_projects";

    protected $fillable = [
        'client_id',
        'project_id',
        'title',
        'description',
        'category',
        'start_date',
        'end_date',
        'budget',
        'priority',
        'documents',
    ];

    protected $casts = [
        'documents' => 'array', // Ensure documents are cast to an array
    ];
}
