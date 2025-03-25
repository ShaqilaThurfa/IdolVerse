<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }

    public function tables()
    {
        return view('tables');
    }

    public function billing()
    {
        return view('billing');
    }
}
