<?php


namespace App\Orchid\Screens\Applications;

use Orchid\Support\Facades\Layout;
use App\Models\Application;
use App\Orchid\Layouts\Applications\ApplicationActiveLayout;
use App\Orchid\Layouts\Applications\ApplicationResolvedLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Screen;

class ApplicationScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'ApplicationsActive' => Application::where('status', 'active')->filters()->defaultSort('id', 'desc')->paginate(),
            'ApplicationsResolved' => Application::where('status', 'resolved')->filters()->defaultSort('id', 'desc')->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Applications');
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'platform.applications.read'
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::tabs([
                'Active' => ApplicationActiveLayout::class,
                'Resolved' => ApplicationResolvedLayout::class,
            ])->activeTab('Active'),
        ];
    }

}


