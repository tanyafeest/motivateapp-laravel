<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class PaymentController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * Display the charge view
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(! Auth::user(), 404);

        $user = Auth::user();
        
        $intent = $user->createSetupIntent();
        
        $client = new Client();
        $response = $client->get("https://restcountries.com/v2/all");
        $countries = json_decode($response->getBody(), true);

        return view('payment', compact('user', 'intent', 'countries'));
    }
}
