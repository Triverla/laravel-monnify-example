<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Triverla\LaravelMonnify\Facades\Monnify;

class AccountController extends Controller
{
    public function createVirtualAccount(Request $request)
    {
        //Data can be gotten from Database or from a Form
        try {
            $accountReference = 'TRI' . strtoupper(Str::random(7));
            $accountName = 'Benaiah Yusuf';
            $customerEmail = 'yusufbenaiah@gmail.com';
            $customerName = 'Benaiah Yusuf';
            $bvn = '0123456789';
            $currencyCode = 'NGN';

            return Monnify::ReservedAccount()->reserveAccount($accountReference, $accountName, $customerEmail, $customerName, $bvn, $currencyCode);
        }catch (\Exception $e){
            throw new \Error($e->getMessage());
        }

    }

    public function getAccountDetails(Request $request)
    {
        return Monnify::ReservedAccount()->getAccountDetails($request->query('accountReference'));
    }
}
