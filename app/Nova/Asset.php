<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Asset extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Asset::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'asset_id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'asset_id', 'location', 'type', 'make', 'model', 'identifier', 'supplier', 'supply_date', 'serial_no', 'other_ids', 'invoice_no'
    ];

    /**
     * The visual style used for the table. Available options are 'tight' and 'default'.
     *
     * @var string
     */
    public static $tableStyle = 'tight';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'internal_id')->sortable(),

            Text::make('Asset ID', 'asset_id')
                ->sortable()
                ->rules('max:16'),

            Text::make('Location')
                ->sortable()
                ->rules('max:40'),

            Text::make('Type')
                ->sortable()
                ->rules('max:40'),

            Text::make('Make')
                ->sortable()
                ->rules('max:40'),

            Text::make('Model')
                ->sortable()
                ->rules('max:100'),

            Text::make('Identifier')
                ->sortable()
                ->rules('max:100'),

            Text::make('Supplier')
                ->sortable()
                ->rules('max:50'),

            Text::make('Supply Date')
                ->sortable()
                ->rules('max:60'),

            Text::make('Serial Number', 'serial_no')
                ->sortable()
                ->rules('max:40'),

            Text::make('Other IDs')
                ->sortable()
                ->rules('max:100'),

            Text::make('Invoice Number', 'invoice_no')
                ->sortable()
                ->rules('max:20'),

            HasMany::make('AssetComment','comments')

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
