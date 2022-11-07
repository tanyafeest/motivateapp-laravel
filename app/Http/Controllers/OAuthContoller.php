<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class OAuthContoller extends Controller
{
    /**
     * Display the OAuth view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.oauth');
    }

    // go to Register and process registeration
    protected function _gotoRegisterWithCredentialOrLogin($data){
        $user = User::where('email', $data->email)->first();
        if(!$user){
            session(["temp_first_name" => $data->user["given_name"]]);
            session(["temp_last_name" => $data->user["family_name"]]);
            session(["temp_email" => $data->email]);
            session(["temp_avatar" => $data->avatar]);

            redirect()->intended(RouteServiceProvider::REGISTER)->send();
        } else {
            session()->forget("temp_first_name");
            session()->forget("temp_last_name");
            session()->forget("temp_email");
            session()->forget("temp_avatar");

            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }

    // Google
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    // Google callback  
    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->user();
    
        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Facebook
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook callback  
    public function handleFacebookCallback() {
        $user = Socialite::driver('facebook')->user();
    
        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Instagram
    public function redirectToInstagram() {
        return Socialite::driver('instagram')->redirect();
    }

    // Instagram callback
    public function handleInstagramCallback() {
        $user = Socialite::driver('instagram')->user();

        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Twitter
    public function redirectToTwitter() {
        return Socialite::driver('twitter-oauth-2')->redirect();
    }

    // Twitter callback
    public function handleTwitterCallback() {
        $user = Socialite::driver('twitter-oauth-2')->user();

        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Apple
    public function redirectToApple() {
        return Socialite::driver('apple')->redirect();
    }

    // Apple callback
    public function handleAppleCallback() {
        $user = Socialite::driver('apple')->user();

        $this->_gotoRegisterWithCredentialOrLogin($user);
    }
}
