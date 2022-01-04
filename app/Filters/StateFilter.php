<?php

namespace App\Filters;

use App\Enums\PhoneStatesEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

/**
 * Class StateFilter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
class StateFilter implements Filter
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        if (in_array($value, PhoneStatesEnum::getAllowedValuesForFilter())) {
            $customerIdsThatHasInvalidNumbers = explode('_', Cache::get(PhoneStatesEnum::CACHE_KEY));

            if (intval($value) === PhoneStatesEnum::INVALID) {
                return $builder->whereIn('id', $customerIdsThatHasInvalidNumbers);
            }

            return $builder->whereNotIn('id', $customerIdsThatHasInvalidNumbers);
        }

        return $builder;
    }
}
