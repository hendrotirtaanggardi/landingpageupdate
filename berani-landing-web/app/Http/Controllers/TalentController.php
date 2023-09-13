<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MainContent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('talent.index', [
            'tabTitle' => 'Your Information Page',
            'content' => MainContent::where('content_id', 3)->first()
        ]);
    }

    public function show(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return redirect()->route('recruiter');
        }
        return view('talent.show', [
            'tabTitle' => 'Detail Talent',
            'talent' => $user
        ]);
    }
}
