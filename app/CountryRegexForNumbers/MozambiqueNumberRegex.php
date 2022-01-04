<?php

namespace App\CountryRegexForNumbers;

/**
 * Class MozambiqueNumberRegex
 * @package App\CountryRegexForNumbers
 * @author Ahmed Helal Ahmed
 */
class MozambiqueNumberRegex extends CountryRegex
{
    const code = "258";
    const regex = "\(258\)\ ?[28]\d{7,8}$";
}
