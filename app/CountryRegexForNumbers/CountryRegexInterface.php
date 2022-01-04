<?php

namespace App\CountryRegexForNumbers;

interface CountryRegexInterface
{
    public function isNumberHasTheSameCode(string $number): bool;

    public function isNumberValid(string $number): bool;
}
