<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Triverla\LaravelMonnify\Facades\Monnify;

class PaymentController extends Controller
{
    /**
     * Redirect the Customer to Monnify Payment Page
     * @return Url
     */
    public function redirectToMonnifyGateway()
    {
        try{

//            $data = [
//                "amount" => 1000,
//                "customerName" => 'John Doe',
//                "customerEmail" => 'john.doe@mail.com',
//                "paymentReference" => 'abcd12345678efghi',
//                "paymentDescription" => 'Payment for goods & services',
//                "currencyCode" => "NGN",
//                "redirectUrl" => 'http://localhost:8001/payment/callback',
//                "paymentMethods" => ['CARD', 'ACCOUNT_TRANSFER']
//            ];
//            return Monnify::Payment()->makePaymentRequest($data)->redirectNow();

            //Get data from form request
            return Monnify::Payment()->makePaymentRequest()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['message'=>'The Monnify token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Get payment information
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Monnify::Payment()->getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can then redirect or do whatever you want
    }
}
