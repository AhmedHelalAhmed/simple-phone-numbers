<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Cache;

/**
 * Class CachingInvalidPhoneNumbersService
 * @package App\Services
 * @author Ahmed Helal Ahmed
 */
class CachingInvalidPhoneNumbersService
{
    // Check the cache if it has ids ignore the event
    // Otherwise loop over customers phone numbers and cache invalid ids of them for one hour let's say
    // I assume that count of invalid numbers always greater than the valid count, so I will store the invalid ids
    /**
     * @var GettingDetailsOfNumberService
     */
    private $gettingDetailsOfNumberService;
    private $customersIdsThatHasInvalidNumbers = [];

    public function __construct(GettingDetailsOfNumberService $gettingDetailsOfNumberService)
    {
        $this->gettingDetailsOfNumberService = $gettingDetailsOfNumberService;
    }

    public function execute()
    {

        if (Cache::get('customersIdsThatHasInvalidPhoneNumber')) {
            return;
        }

        Customer::query()
            ->select(['phone', 'id'])
            ->chunk(15, function ($customers) {
                foreach ($customers as $customer) {
                    [
                        'countryCode' => $countryCode,
                        'numberIsValid' => $numberIsValid,
                        'countryName' => $countryName
                    ] = $this->gettingDetailsOfNumberService->execute($customer->phone);

                    if (!$numberIsValid) {
                        $this->customersIdsThatHasInvalidNumbers[] = $customer->id;
                    }

                }
            });


        Cache::put('customersIdsThatHasInvalidPhoneNumber', implode('_', $this->customersIdsThatHasInvalidNumbers),
            3600);// cache for one hour let's say
    }
}
