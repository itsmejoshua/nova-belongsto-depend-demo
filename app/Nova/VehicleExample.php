<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class VehicleExample extends Resource
{
    public static $group = 'Examples';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\VehicleExample::class;

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
            NovaBelongsToDepend::make('Classification', 'classification')
                ->options(\App\Models\Classification::all()),
            NovaBelongsToDepend::make('Brand', 'brand')
                ->optionsResolve(function ($classification) {
                    return $classification->brands()->get(['brands.id', 'brands.name']);
                })
                ->dependsOn('classification'),

            // Preparation for the pull request. Depend on several models.
            NovaBelongsToDepend::make('Model', 'model', VehicleModel::class)
                ->optionsResolve(function ($depends) {
                    return \App\Models\VehicleModel::query()
                        ->where('classification_id', $depends->classification->id)
                        ->where('brand_id', $depends->brand->id)
                        ->get();
                })
                ->dependsOn('classification', 'brand'),
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
