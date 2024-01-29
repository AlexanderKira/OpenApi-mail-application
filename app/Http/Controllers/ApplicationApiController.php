<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Service\ApplicationService;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;


class ApplicationApiController extends Controller
{
    protected ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function index(Request $request): JsonResponse
    {
        $status = $request->get('status');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        if (!$endDate) {
            $endDate = Date::today()->format('Y-m-d');
        }

        $applications = Application::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
            $startDateFormatted = Carbon::parse($startDate)->startOfDay();
            $endDateFormatted = Carbon::parse($endDate)->endOfDay();
            return $query->whereBetween('created_at', [$startDateFormatted, $endDateFormatted]);
        })->get();

        if ($applications) {
            return response()->json(['applications' => $applications], 200);
        } else {
            return response()->json(['message' => 'No applications.'], 400);
        }
    }

    public function store(ApplicationRequest $request, Application $application): JsonResponse
    {
        $data = $request->validated();

        $result = $this->applicationService->saveApplication($data, $application);

        if ($result) {
            return response()->json(['message' => 'Application created successfully'], 201);
        } else {
            return response()->json(['message' => 'There was a problem with creating your application.'], 400);
        }
    }

    public function update(Request $request, Application $application): JsonResponse
    {
        $comment = $request->input('comment');

        $application->comment = $comment;
        $application->status = 'resolved';
        $application->save();

        if ($comment) {
            $this->applicationService->mailReply($application->email, $application->comment);
            return response()->json(['message' => 'Reply sent'], 201);
        } else {
            return response()->json(['message' => 'There was a problem submitting your application.'], 400);
        }
    }


}
