<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           "personal_info.first_name" => 'required|string|max:255',
           "personal_info.last_name" => 'required|string|max:255',
           "personal_info.middle_name" => 'required|string|max:255',
           "personal_info.gender" => 'required|string|in:male,female,other',
           "personal_info.marital_status" => 'required|string|in:single,married,divorced,widowed',
           "personal_info.user_type" => 'required|string|in:driver,client'
        ];
    }
}
