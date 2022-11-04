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
            session(["temp_name", $data->name]);
            session(["temp_email", $data->email]);

            return redirect()->intended(RouteServiceProvider::REGISTER);
        } else {
            session()->delete("temp_name");
            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME);
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
