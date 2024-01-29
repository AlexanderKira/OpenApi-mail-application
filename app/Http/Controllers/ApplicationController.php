<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Service\ApplicationService;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;


class ApplicationController extends Controller
{
    protected ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function store(ApplicationRequest $request, Application $application): RedirectResponse
    {
        $data = $request->validated();

        $result = $this->applicationService->saveApplication($data, $application);

        if ($result) {
            session()->flash('success', 'Application submitted successfully!');
        } else {
            session()->flash('error', 'There was a problem submitting your application.');
        }

        return redirect()->back();
    }

}

