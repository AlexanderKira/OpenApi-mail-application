<?php

namespace App\Orchid\Screens\Applications;

use App\Http\Service\ApplicationService;
use App\Mail\ApplicationEmail;
use App\Models\Application;
use App\Orchid\Layouts\Applications\ApplicationEditLayout;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Orchid\Screen\Action;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ApplicationEditScreen extends Screen
{
    public ?Application $application = null;
    protected ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Application $application): iterable
    {
        return [
            'application' => $application
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Response to application');
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
            'platform.applications.write'
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
            ApplicationEditLayout::class
        ];
    }

    public function reply(Request $request, Application $application): RedirectResponse
    {
        $comment = $request->input('application.comment');

        $application->comment = $comment;
        $application->status = 'resolved';
        $application->save();

        try {
            $this->applicationService->mailReply($application->email, $application->comment);
            Toast::info('Reply sent');
        } catch (\Exception $e) {
            Toast::error('Failed to send email: ' . $e->getMessage());
        }

        return redirect()->back();
    }

}
