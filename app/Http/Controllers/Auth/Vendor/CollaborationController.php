<?php

namespace App\Http\Controllers\Auth\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollaborationController extends Controller
{
    public function index(){
        return view('auth.vendor.collaboration.collaboration');
    }
}
