<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrameworkLibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('framework-library.index', [
            'tabTitle' => 'Manage Framework Libraries'
        ]);
    }
}
