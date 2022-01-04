<?php

namespace App\CountryRegexForNumbers;

/**
 * Class MoroccoNumberRegex
 * @package App\CountryRegexForNumbers
 * @author Ahmed Helal Ahmed
 */
class MoroccoNumberRegex extends CountryRegex
{
    const code = "212";
    const regex = "\(212\)\ ?[5-9]\d{8}$";
}
