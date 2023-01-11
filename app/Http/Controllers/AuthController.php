<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Sport;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Display the Registration view.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        // check pass oauth
        if(!session()->has("temp_name") && !session()->has("temp_email")) {
            // then redirect oauth
            return redirect("/oauth");
        }

        $sports = Sport::all();
        return view('auth.register', ['sports' => $sports]);
    }

    /**
     * Display the OAuth Registration view.
     *
     * @return \Illuminate\View\View
     */
    public function oauth()
    {
        $user_requested_inspire = null;

        if(session()->has("temp_inspiration_share_link")) {
            $user_requested_inspire = User::firstWhere('share_link', session('temp_inspiration_share_link'));
        }
        
        return view('registration', compact('user_requested_inspire'));
    }
    
    /**
     * Go to register page with oauth credential or login
     *
     * @return Redirect
     */
    protected function _gotoRegisterWithCredentialOrLogin($data){
        $user = User::where('email', $data->email)->first();
        if(!$user){
            session(["temp_id" => $data->id]);
            session(["temp_first_name" => $data->user["given_name"]]);
            session(["temp_last_name" => $data->user["family_name"]]);
            session(["temp_email" => $data->email]);
            session(["temp_avatar" => $data->avatar]);

            redirect()->intended(RouteServiceProvider::REGISTER)->send();
        } else {
            session()->forget("temp_id");
            session()->forget("temp_first_name");
            session()->forget("temp_last_name");
            session()->forget("temp_email");
            session()->forget("temp_avatar");
            session()->forget("temp_social_app");

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
        session(["temp_social_app" => 'Google']);
    
        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Facebook
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook callback  
    public function handleFacebookCallback() {
        $user = Socialite::driver('facebook')->user();
        session(["temp_social_app" => 'Facebook']);
    
        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Instagram
    public function redirectToInstagram() {
        return Socialite::driver('instagram')->redirect();
    }

    // Instagram callback
    public function handleInstagramCallback() {
        $user = Socialite::driver('instagram')->user();
        session(["temp_social_app" => 'Instagram']);

        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Twitter
    public function redirectToTwitter() {
        return Socialite::driver('twitter-oauth-2')->redirect();
    }

    // Twitter callback
    public function handleTwitterCallback() {
        $user = Socialite::driver('twitter-oauth-2')->user();
        session(["temp_social_app" => 'Twitter']);

        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Apple
    public function redirectToApple() {
        return Socialite::driver('apple')->redirect();
    }

    // Apple callback
    public function handleAppleCallback() {
        $user = Socialite::driver('apple')->user();
        session(["temp_social_app" => 'Apple']);

        $this->_gotoRegisterWithCredentialOrLogin($user);
    }

    // Spotify
    public function redirectToSpotify($redirect_url) {
        session()->flash('temp_redirect_url', $redirect_url);
        return Socialite::driver('spotify')->scopes(['user-top-read'])->redirect();
    }

    // Spotify callback
    public function handleSpotifyCallback() {
        try {
            $user = Socialite::driver('spotify')->user();

            session(['temp_spotify_id' => $user->id]);
            session(['temp_spotify_access_token' => $user->token]);
            session(['temp_spotify_refresh_token' => $user->refreshToken]);

            return redirect()->intended(route(session('temp_redirect_url')))->send();
        } catch (Exception $e) {
            if($e->getCode() == 403) {
                session(['temp_spotify_status' => 'USER_NOT_REGISTERED']);
            }

            return redirect()->intended(route(session('temp_redirect_url')))->send();
        }
    }
}
