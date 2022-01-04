<?php

namespace App\Services;

use App\Enums\PhoneStatesEnum;
use App\Filters\CountryFilter;
use App\Models\Customer;

/**
 * Class IndexingPhoneNumberService
 * @package App\Services
 * @author Ahmed Helal Ahmed
 */
class IndexingPhoneNumberService
{
    /**
     * @var Customer
     */
    private $customers;
    /**
     * @var GettingDetailsOfNumberService
     */
    private $gettingDetailsOfNumberService;
    /**
     * @var GettingCountriesService
     */
    private $gettingCountriesService;

    /**
     * @param Customer $customers
     * @param GettingDetailsOfNumberService $gettingDetailsOfNumberService
     * @param GettingCountriesService $gettingCountriesService
     */
    public function __construct(
        Customer $customers,
        GettingDetailsOfNumberService $gettingDetailsOfNumberService,
        GettingCountriesService $gettingCountriesService
    ) {
        $this->customers = $customers;
        $this->gettingDetailsOfNumberService = $gettingDetailsOfNumberService;
        $this->gettingCountriesService = $gettingCountriesService;
    }

    /**
     * @return mixed
     */
    public function execute(array $filters): array
    {
        $phoneNumbers = $this->customers
            ->filter(
                $this->getFilters(),
                $filters
            )
            ->simplePaginate()
            ->through(function ($customer) {
                [
                    'countryCode' => $countryCode,
                    'numberIsValid' => $numberIsValid,
                    'countryName' => $countryName
                ] = $this->gettingDetailsOfNumberService->execute($customer->phone);

                [, $phoneNumbers] = explode(' ', $customer->phone);
                return [
                    'countryName' => $countryName,
                    'state' => PhoneStatesEnum::getText($numberIsValid),
                    'countryCode' => $countryCode,
                    'phoneNumber' => $phoneNumbers
                ];
            });
        $countries = $this->gettingCountriesService->execute();
        $states = PhoneStatesEnum::ALLOWED_OPTIONS;
        return compact('phoneNumbers', 'countries', 'states');
    }

    /**
     * @return CountryFilter[]
     */
    private function getFilters(): array
    {
        return [
            'country_code' => new CountryFilter(),
        ];
    }
}
