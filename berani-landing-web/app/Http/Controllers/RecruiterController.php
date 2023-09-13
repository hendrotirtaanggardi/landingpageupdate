<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('recruiter.index', [
            'tabTitle' => 'Recruiter Page'
        ]);
    }
}
