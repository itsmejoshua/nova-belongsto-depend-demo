<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class CityExample extends Resource
{
    public static $group = 'Examples';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\CityExample::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            NovaBelongsToDepend::make('Country')
                ->options(\App\Models\Country::all())
                ->sortable(),
            NovaBelongsToDepend::make('State')
                ->optionsResolve(function ($country) {
                    return $country->states()->get(['id', 'name']);
                })
                ->dependsOn('country')
                ->sortable(),
            NovaBelongsToDepend::make('City')
                ->optionsResolve(function ($state) {
                    return $state->cities()->get(['id', 'name']);
                })
                ->dependsOn('state')
                ->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
