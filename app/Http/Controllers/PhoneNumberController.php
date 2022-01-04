<?php

namespace App\Http\Controllers;


use App\Http\Requests\PhoneNumberRequest;
use App\Services\IndexingPhoneNumberService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class PhoneNumberController
 * @package App\Http\Controllers
 * @author Ahmed Helal Ahmed
 */
class PhoneNumberController extends Controller
{
    /**
     * @param IndexingPhoneNumberService $indexingPhoneNumberService
     * @param PhoneNumberRequest $phoneNumberRequest
     * @return Application|Factory|View
     */
    public function __invoke(
        IndexingPhoneNumberService $indexingPhoneNumberService,
        PhoneNumberRequest $phoneNumberRequest
    ) {
        return view('phoneNumbers.index', $indexingPhoneNumberService->execute($phoneNumberRequest->validated()));
    }
}
