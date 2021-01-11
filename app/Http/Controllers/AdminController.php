<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        // $this->middleware('auth')->except(['index2']);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function index2()
    {
        return view('admin.index');
    }
}
