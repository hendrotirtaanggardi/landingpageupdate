<?php

namespace App\Http\Controllers;

use App\Models\MainContent;

use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index()
    {
        return view('welcome', [
            'content' => MainContent::where('section', 1)
        ]);
    }
}
