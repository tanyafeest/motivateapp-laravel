<?php

namespace App\Http\Controllers;

use CountryState;
use Illuminate\Support\Facades\Auth;

class PaymentController
{
    /**
     * Display the charge view
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        abort_if(! Auth::user(), 404);

        $user = Auth::user();
        $countries = CountryState::getCountries();

        $intent = $user->createSetupIntent();

        return view('payment', compact('user', 'intent', 'countries'));
    }
}
