<?php

namespace App\Http\Service;

use App\Mail\ApplicationEmail;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

class ApplicationService
{
    public function saveApplication(array $data, Application $application): bool
    {
        try {
            $application->fill($data);
            $application->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function mailReply($mail, $comment): void
    {
        Mail::to($mail)->send(new ApplicationEmail($comment));
    }
}
