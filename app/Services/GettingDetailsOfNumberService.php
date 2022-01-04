<?php

namespace App\Services;

use App\Enums\PhoneStatesEnum;
use App\Models\Customer;

/**
 * Class GettingDetailsOfNumberService
 * @package App\Services
 * @author Ahmed Helal Ahmed
 */
class GettingDetailsOfNumberService
{
    /**
     * @param string $number
     * @return array
     */
    public function execute(string $number): array
    {
        $countryCode = '';
        $numberIsValid = false;
        $countryName = '';

        foreach (Customer::COUNTRIES_REGEX as $regex) {
            $countryRegex = (new $regex);
            if ($countryRegex->isNumberHasTheSameCode($number)) {
                $countryCode = $countryRegex->getCountryCodeFormatted();
                $numberIsValid = $countryRegex->isNumberValid($number);
                $countryName = $countryRegex->getName();
            }
        }

        return compact('countryCode', 'numberIsValid', 'countryName');
    }
}
