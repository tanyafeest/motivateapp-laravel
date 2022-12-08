<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CountryState;

class PaymentController extends Controller
{
    /**
     * Display the payment upgrade view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('upgrade');
    }

    /**
     * Display the charge view
     * 
     * @return \Illuminate\View\View
     */
    public function payment()
    {
        $user = Auth::user();
        $countries = CountryState::getCountries();

        $intent = $user->createSetupIntent();

        return view('payment', compact('user', 'intent', 'countries'));
    }
}
