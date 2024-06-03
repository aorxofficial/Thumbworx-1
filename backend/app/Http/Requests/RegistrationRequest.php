<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $personalInfo = [
            'first_name' => strip_tags($this->input('personal_info.first_name')),
            'last_name' => strip_tags($this->input('personal_info.last_name')),
            'middle_name' => strip_tags($this->input('personal_info.middle_name')),
            'email' => strip_tags($this->input('personal_info.email')),
        ];

        $permanentAddress = [
            'house_number' => strip_tags($this->input('permanent_address.house_number')),
            'street' => strip_tags($this->input('permanent_address.street')),
            'barangay' => strip_tags($this->input('permanent_address.barangay')),
            'city' => strip_tags($this->input('permanent_address.city')),
            'province' => strip_tags($this->input('permanent_address.province')),
            'region' => strip_tags($this->input('permanent_address.region')),
            'country' => strip_tags($this->input('permanent_address.country')),
        ];

        $currentAddress = [
            'house_number' => strip_tags($this->input('current_address.house_number')),
            'street' => strip_tags($this->input('current_address.street')),
            'barangay' => strip_tags($this->input('current_address.barangay')),
            'city' => strip_tags($this->input('current_address.city')),
            'province' => strip_tags($this->input('current_address.province')),
            'region' => strip_tags($this->input('current_address.region')),
            'country' => strip_tags($this->input('current_address.country')),
        ];
        
        $dataToMerge = [
            'personal_info' => array_merge($this->input('personal_info'), $personalInfo),
            'permanent_address' => $permanentAddress,
            'current_address' => $currentAddress
        ];

        if ($this->input('personal_info.user_type') == 'driver') {
            $emergencyContact = [
                'contact_person' => strip_tags($this->input('driver.contact_person')),
                'contact_person_relationship' => strip_tags($this->input('driver.contact_person_relationship')),
                'contact_person_phone_number' => strip_tags($this->input('driver.contact_person_phone_number')),
                'contact_person_email' => strip_tags($this->input('driver.contact_person_email')),
                'contact_person_address' => strip_tags($this->input('driver.contact_person_address')),
            ];

            $dataToMerge['driver'] = $emergencyContact;
        
        } else if ($this->input('personal_info.user_type') == 'client') {
            $companyContact = [
                'company_name' => strip_tags($this->input('client.company_name')),
                'company_telephone_number' => strip_tags($this->input('client.company_telephone_number')),
                'company_address' => strip_tags($this->input('client.company_address')),
            ];

            $dataToMerge['client'] = $companyContact;
        }

        $this->merge($dataToMerge);
    }
    
    protected function withValidator($validator)
    {
        Log::info("An after problem?");
        $validator->after(function ($validator) {
            if ($this->has('personal_info.birth_date')) {
                $birthdate = Carbon::parse($this->input('personal_info.birth_date'));
                $age = $birthdate->diffInYears(Carbon::now());

                if ($age < 18) {
                    $validator->errors()->add('personal_info.birth_date', 'You must be at least 18 years old.');
                }
            }
        });
    }

    
    public function rules(): array
    {
        $rules = [
            "personal_info.first_name" => 'required|string|max:255',
            "personal_info.last_name" => 'required|string|max:255',
            "personal_info.middle_name" => 'required|string|max:255',
            "personal_info.email" => 'required|email|max:50|unique:users,email',
            "personal_info.gender" => 'required|string|in:male,female,other',
            "personal_info.birth_date" => 'required|date',
            "personal_info.marital_status" => 'required|string|in:single,married,divorced,widowed',
            "personal_info.user_type" => 'required|string|in:driver,client',
            "personal_info.phone_number1" => 'required|string|max:11',    
            "personal_info.phone_number2" => "nullable|string|max:11",

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

        if ($this->input('personal_info.user_type') === 'driver') {
            $rules = array_merge($rules, [
                "driver.contact_person" => "required|string|max:100",
                "driver.contact_person_relationship" => "required|string|max:100",
                "driver.contact_person_phone_number" => "required|string|max:12",
                "driver.contact_person_email" => "required|email",
                "driver.contact_person_address" => "required|string|max:255"
                // "driver.nbi_license" => "required|file",
                // "driver.license" => "required|file",
                // "driver.lto_driving_history" => "required|file"
            ]);
        }

        if ($this->input('personal_info.user_type') === 'client') {
            $rules = array_merge($rules, [
                "client.company_name" => "required|string|max:255",
                "client.company_telephone_number" => "required|string",
                "client.company_address" => "required|string",
                // "company_registration_number" => 'required|string|max:50',
                // "client_document" => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);
        }

        return $rules;
    }
}
