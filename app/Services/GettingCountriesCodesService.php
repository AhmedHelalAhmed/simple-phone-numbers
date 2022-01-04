<?php

namespace App\Services;

use App\Models\Customer;

class GettingCountriesCodesService
{
    public function execute(): array
    {
        return array_map(function ($countryRegexClass) {
            $countryRegex = new $countryRegexClass;
            return $countryRegex->getCountryCode();

        }, Customer::COUNTRIES_REGEX);
    }
}
