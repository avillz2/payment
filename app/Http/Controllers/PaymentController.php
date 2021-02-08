<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Models\Product;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }



    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
     //   $success = $paymentDetails['data']['status'];
       $id= $paymentDetails['data']['metadata']['id'];
    //   $message= $paymentDetails['data']['metadata'];
        $product = product::find($id);
        return view('product.succ')->with([
            'product' => $product,
           // 'success' => $success,

        ]);



        // return view('product.succ')->with([
        //     'paymentDetails' => $paymentDetails,


        // ]);



      // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
