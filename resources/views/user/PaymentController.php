<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;


class PaymentController extends Controller
{
    // public $paystack;

    // public function __construct()
    // {
    //     $this->paystack = new Paystack();
    // }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            $value = paystack()->getAuthorizationUrl();
        dd($value);
            // return paystack()->getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {

            dd($e->getMessage());
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails =  $this->Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
