<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request, Application $application): RedirectResponse
    {
        $data = $request->validated();

        try {
            $application->fill($data);
            $application->save();

            session()->flash('success', 'Application submitted successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'There was a problem submitting your application.');
            return redirect()->back();
        }
    }
}
