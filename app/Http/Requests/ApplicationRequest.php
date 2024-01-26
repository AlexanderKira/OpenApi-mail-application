<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
      return [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'max:255'],
          'message' => ['required', 'string', 'max:255'],
      ];
    }
}
