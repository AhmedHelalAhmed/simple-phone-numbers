<?php

namespace App\CountryRegexForNumbers;

use App\Helpers\NumberHelper;

/**
 * Class CountryRegex
 * @package App\CountryRegexForNumbers
 * @author Ahmed Helal Ahmed
 */
abstract class CountryRegex implements CountryRegexInterface
{
    const code = "";
    const regex = "";

    /**
     * @param string $number
     * @return bool
     */
    public function isNumberHasTheSameCode(string $number): bool
    {
        return $this::code === NumberHelper::getCodeFromNumber($number);
    }

    /**
     * @param string $number
     * @return bool
     */
    public function isNumberValid(string $number): bool
    {
        return preg_match('/' . $this::regex . '/', $number);
    }

    public function getCountryCode(): string
    {
        return $this::code;
    }

    public function getCountryCodeFormatted(): string
    {
        return '+' . $this->getCountryCode();
    }

    public function getName(): string
    {
        $nameParts = explode(' ', $this->getClassNameSeparatedBySpacesForEachWord());

        return $nameParts[array_key_first($nameParts)];
    }


    private function getClassNameSeparatedBySpacesForEachWord(): string
    {
        return trim(preg_replace('/[A-Z]/', ' $0', $this->getClassName()));
    }

    private function getClassName(): string
    {
        return class_basename($this);
    }
}
