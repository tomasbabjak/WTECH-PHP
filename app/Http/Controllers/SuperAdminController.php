<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.home');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SUPERADMIN');
    }

}
