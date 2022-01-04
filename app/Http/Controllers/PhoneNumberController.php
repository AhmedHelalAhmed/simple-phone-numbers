<?php

namespace App\Http\Controllers;


use App\Services\IndexingPhoneNumberService;

class PhoneNumberController extends Controller
{
    public function __invoke(IndexingPhoneNumberService $indexingPhoneNumberService)
    {
        return view('phoneNumbers.index', $indexingPhoneNumberService->execute());
    }
}
