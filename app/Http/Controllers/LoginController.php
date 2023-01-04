<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService;   
    }

    //Github Login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    //Github callback  
    public function handleGithubCallback()
    {

        try {
            $user = Socialite::driver('github')->stateless()->user();
        } catch(\Exception $e) {
            return redirect(env('CLIENT_BASE_URL') . '?error=Unable to login using Github. Please try again.');
        }

        $token = $this->authService->registerOrLoginUser($user);

        return redirect(env('CLIENT_BASE_URL') . '?token='.$token);
    }

    public function authCheck()
    {
        return response()->json(Auth::check());
    }

    public function getUser() {
        return Auth::user();
    }

    public function logout()
    {
        return response()->json(Auth::logout());
    }
}
