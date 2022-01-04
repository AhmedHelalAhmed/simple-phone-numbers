<?php

namespace App;

use App\Models\Customer;

/**
 * Class GettingDetailsOfNumberService
 * @package App
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
                $countryCode = $countryRegex->getCountryCode();
                $numberIsValid = $countryRegex->isNumberValid($number);
                $countryName = $countryRegex->getName();
            }
        }

        return compact('countryCode', 'numberIsValid', 'countryName');
    }
}
