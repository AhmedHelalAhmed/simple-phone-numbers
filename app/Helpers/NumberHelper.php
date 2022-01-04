<?php

namespace App\Helpers;

/**
 * Class NumberHelper
 * @package App\Helpers
 * @author Ahmed Helal Ahmed
 */
class NumberHelper
{
    /**
     * @param string $number
     * @return array|string|string[]
     */
    public static function getCodeFromNumber(string $number): string
    {
        [$code,] = explode(' ', $number);

        return str_replace(')', '', str_replace('(', '', $code));
    }
}
