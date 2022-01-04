<?php

namespace App\Models;

use App\CountryRegexForNumbers\CameroonNumberRegex;
use App\CountryRegexForNumbers\EthiopiaNumberRegex;
use App\CountryRegexForNumbers\MoroccoNumberRegex;
use App\CountryRegexForNumbers\MozambiqueNumberRegex;
use App\CountryRegexForNumbers\UgandaNumberRegex;
use App\Traits\CanBeFiltered;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use CanBeFiltered;

    const COUNTRIES_REGEX = [
        CameroonNumberRegex::class,
        EthiopiaNumberRegex::class,
        MoroccoNumberRegex::class,
        MozambiqueNumberRegex::class,
        UgandaNumberRegex::class
    ];

    protected $table = 'customer';
}
