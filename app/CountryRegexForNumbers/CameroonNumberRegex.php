<?php

namespace App\CountryRegexForNumbers;

/**
 * Class CameroonNumberRegex
 * @package App\CountryRegexForNumbers
 * @author Ahmed Helal Ahmed
 */
class CameroonNumberRegex extends CountryRegex
{
    const code = "237";
    const regex = "\(237\)\ ?[2368]\d{7,8}$";
}
