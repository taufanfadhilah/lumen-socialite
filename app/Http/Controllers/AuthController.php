<?php

namespace App\Http\Controllers;
// use Socialite;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return response()->json([
            'message' => 'hi from Auth'
        ]);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();

        // $user->token;

        return response()->json([
            'user' => $user
        ]);
    }
}
