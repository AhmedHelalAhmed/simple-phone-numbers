<?php

namespace App\Services;

use App\Models\Customer;

/**
 * Class GettingCountriesService
 * @package App\Services
 * @author Ahmed Helal Ahmed
 */
class GettingCountriesService
{
    /**
     * @return array|array[]
     */
    public function execute(): array
    {
        return array_map(function ($countryRegexClass) {
            $countryRegex = new $countryRegexClass;
            return [
                'code' => $countryRegex->getCountryCode(),
                'name' => $countryRegex->getName()
            ];

        }, Customer::COUNTRIES_REGEX);
    }
}
