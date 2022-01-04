<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class CountryFilter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
class CountryFilter implements Filter
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        if ($value) {
            return $builder->where('phone', 'like', '(' . $value . ')%');
        }

        return $builder;
    }
}
