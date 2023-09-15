<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PaymentCancelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //
     /**
     * Process the payment
     * 
     * @return void
     */
    public function __invoke()
    {
       //Return if a non-user ends up inside a controller that requires authentication, etc
       abort_if(!Auth::user(), 404);

       $user = Auth::user();

       try {
           $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->cancel();
       } catch (\Throwable $th) {
           throw $th;
       }
    }
}
