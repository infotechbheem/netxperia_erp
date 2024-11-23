<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $table = "project_categories";
    protected $fillable = [
        'project_category',
    ];
}
