<?php

namespace App\Http\Controllers\Auth\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectAnalyticsReportController extends Controller
{
    public function index(){
        return view('auth.vendor.project-analytics.project-analytics');
    }
}
