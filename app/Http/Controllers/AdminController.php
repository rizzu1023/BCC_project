<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function getDashboard(){
        return view('admin/dashboard');
    }
}
