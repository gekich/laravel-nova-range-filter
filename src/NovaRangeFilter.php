<?php

namespace Gekich\NovaRangeFilter;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Nova\Filters\Filter;

class NovaRangeFilter extends Filter
{

    /**
     * Filterable column.
     *
     * @var string
     */
    public $column = 'price';

    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Price filter';

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'nova-range-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $decodedValues = json_decode($value, true);

        $query->when(Arr::get($decodedValues, 'minValue', false), function ($q, $min) {
            return $q->where($this->column, '>', $min);
        });

        $query->when(Arr::get($decodedValues, 'maxValue', false), function ($q, $max) {
            return $q->where($this->column, '<', $max);
        });

        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [];
    }
}
