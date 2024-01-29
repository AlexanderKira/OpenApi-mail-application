<?php

namespace App\Orchid\Layouts\Applications;

use App\Models\Application;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ApplicationResolvedLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'ApplicationsResolved';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', __('ID')),
            TD::make('name', __('Name')),
            TD::make('email', __('Email')),
            TD::make('status', __('Status')),
            TD::make(__('Actions'))
                ->render(function (Application $application) {
                    return Link::make(__('Reply'))
                        ->icon('speech')
                        ->route('platform.applications.edit', $application);
                })
        ];
    }
}



