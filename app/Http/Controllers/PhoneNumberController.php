<?php

namespace App\Http\Controllers;


use App\GettingDetailsOfNumberService;

class PhoneNumberController extends Controller
{
    public function __invoke()
    {
        /*
        $customer = \App\Models\Customer::first();
        return (new GettingDetailsOfNumberService)->execute($customer->phone);
        */
        return view('phoneNumbers.index');
    }
}
