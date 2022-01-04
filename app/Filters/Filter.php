<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Filter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
interface Filter
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder;
}
