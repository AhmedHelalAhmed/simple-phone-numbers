<?php

namespace App\CountryRegexForNumbers;

/**
 * Class EthiopiaNumberRegex
 * @package App\CountryRegexForNumbers
 * @author Ahmed Helal Ahmed
 */
class EthiopiaNumberRegex extends CountryRegex
{
    const code = "251";
    const regex = "\(251\)\ ?[1-59]\d{8}$";
}
