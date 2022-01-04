<?php

namespace App\Traits;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CanBeFiltered
 * @package App\Traits
 */
trait CanBeFiltered
{
    /**
     * @param Builder $builder
     * @param $filters
     * @param $clientQuery
     * @return Builder
     */
    public function scopeFilter(Builder $builder, $filters, $clientQuery): Builder
    {
        return (new BaseFilter($clientQuery))->apply($builder, $filters);
    }
}
