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
        //    "personal_info.user_type" => 'required|string|in:driver,client',
            // i have no idea how PH addresses work. form validation might need work in here
        //    "permanent_address.zip_code" => "required|string|max:100",
        //    "current_address.zip_code" => "required|string|max:100",


        return [
           "personal_info.first_name" => 'required|string|max:255',
           "personal_info.last_name" => 'required|string|max:255',
           "personal_info.middle_name" => 'required|string|max:255',
           "personal_info.gender" => 'required|string|in:male,female,other',
           "personal_info.marital_status" => 'required|string|in:single,married,divorced,widowed',
           "personal_info.user_type" => 'required|string|in:driver,client',

           "permanent_address.house_number" => 'required|string|max:10',
           "permanent_address.street" => "required|string|max:100",
           "permanent_address.barangay" => "required|string|max:100",
           "permanent_address.city" => "required|string|max:100",
           "permanent_address.province" => "required|string|max:100",
           "permanent_address.region" => "required|string|max:100",
           "permanent_address.country" => "required|string|max:100",
        
           "current_address.house_number" => 'required|string|max:10',
           "current_address.street" => "required|string|max:100",
           "current_address.barangay" => "required|string|max:100",
           "current_address.city" => "required|string|max:100",
           "current_address.province" => "required|string|max:100",
           "current_address.region" => "required|string|max:100",
           "current_address.country" => "required|string|max:100"
            
        ];
    }
}
