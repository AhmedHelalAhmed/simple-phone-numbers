<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Class BaseFilter
 * @package App\Filters
 * @author Ahmed Helal Ahmed
 */
class BaseFilter
{
    /**
     * The data that comes from request
     * @var array
     */
    private $clientQuery;

    /**
     * BaseFilter constructor.
     * @param array $clientQuery
     */
    public function __construct(array $clientQuery)
    {
        $this->clientQuery = $clientQuery;
    }

    /**
     * @param Builder $builder
     * @param array $filters
     * @return Builder
     */
    public function apply(Builder $builder, array $filters): Builder
    {
        $targetFilters = $this->getTargetFilters($filters);
        foreach ($targetFilters as $key => $filter) {
            if (!($filter instanceof Filter)) {
                continue;
            }
            $filter->apply($builder, $this->clientQuery[$key]);
        }

        return $builder;
    }

    /**
     * @param array $filters
     * @return array
     */
    private function getTargetFilters(array $filters): array
    {
        return Arr::only($filters, array_keys($this->clientQuery));
    }
}
