<?php

namespace App\Enums;

/**
 * Class PhoneStatesEnum
 * @package App\Enums
 * @author Ahmed Helal Ahmed
 */
class PhoneStatesEnum
{
    const INVALID_OR_VALID = 1;
    const INVALID = 2;
    const VALID = 3;


    const VALID_TEXT = 'OK';
    const INVALID_TEXT = 'NOK';

    const CACHE_KEY = 'customersIdsThatHasInvalidPhoneNumber';

    const ALLOWED_OPTIONS = [
        self::INVALID_OR_VALID => 'All Numbers',
        self::INVALID => 'Invalid phone numbers',
        self::VALID => 'Valid phone numbers',
    ];


    const MAP_CLIENT_VALUES = [
        self::INVALID => false,
        self::VALID => true
    ];

    /**
     * @param bool $isValidNumber
     * @return string
     */
    public static function getText(bool $isValidNumber): string
    {
        if ($isValidNumber) {
            return self::VALID_TEXT;
        }

        return self::INVALID_TEXT;
    }


    public static function getAllowedValues(): array
    {
        return array_keys(PhoneStatesEnum::ALLOWED_OPTIONS);
    }


    public static function getAllowedValuesForFilter(): array
    {
        return array_keys(PhoneStatesEnum::MAP_CLIENT_VALUES);
    }
}
