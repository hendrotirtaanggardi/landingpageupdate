<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('programming-language.index', [
            'tabTitle' => 'Manage Programming Languages'
        ]);
    }
}
