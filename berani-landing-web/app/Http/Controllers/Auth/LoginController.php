<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        $user = User::find(Auth::user()->id);
        if ($user->hasRole('recruiter')) {
            return '/recruiter';
        } else {
            return '/talent';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $existUser = User::where('email', $user->email)->first();
        if (!$existUser) {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider_id' => $user->id,
                'avatar' => $user->avatar,
            ]);
            $newUser->assignRole('talent');
            Auth::login($newUser);
            return redirect()->route('talent');
        } else {
            Auth::login($existUser);
            return redirect()->route('talent');
        }
        return redirect()->route('/');
    }
}
