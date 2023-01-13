<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inspiration;
use App\Providers\RouteServiceProvider;

class InspirationController extends Controller
{
    /**
     * Display the inspiration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('inspiration');
    }

    /**
     * Display the inspiration card.
     *
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        // check the inspiration is exist or not by id
        $inspiration = Inspiration::find($id);
        if(!$inspiration) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // check owner of this inspiration
        if(Auth::user()->id != $inspiration->user_id) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return view('inspiration-card', compact('id'));
    }

    /**
     * Display the onboarding view.
     *
     * @return \Illuminate\View\View
     */
    public function onboarding()
    {
        return view("onboarding");
    }
}
