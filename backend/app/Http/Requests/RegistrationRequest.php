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

            // $permanentAddress = [
            //     'house_number' => strip_tags($this->input('permanent_address.house_number')),
            //     'street' => strip_tags($this->input('permanent_address.street')),
            //     'barangay' => strip_tags($this->input('permanent_address.barangay')),
            //     'city' => strip_tags($this->input('permanent_address.city')),
            //     'province' => strip_tags($this->input('permanent_address.province')),
            //     'region' => strip_tags($this->input('permanent_address.region')),
            //     'country' => strip_tags($this->input('permanent_address.country')),
            // ];

            // $currentAddress = [
            //     'house_number' => strip_tags($this->input('current_address.house_number')),
            //     'street' => strip_tags($this->input('current_address.street')),
            //     'barangay' => strip_tags($this->input('current_address.barangay')),
            //     'city' => strip_tags($this->input('current_address.city')),
            //     'province' => strip_tags($this->input('current_address.province')),
            //     'region' => strip_tags($this->input('current_address.region')),
            //     'country' => strip_tags($this->input('current_address.country')),
            // ];

        //     // $emergencyContact = [];
        //     // if ($this->input('personal_info.user_type') === 'driver') {
        //     //     $emergencyContact = [
        //     //         'full_name' => strip_tags($this->input('emergency_contact.full_name')),
        //     //         'relationship' => strip_tags($this->input('emergency_contact.relationship')),
        //     //         'phone_number' => strip_tags($this->input('emergency_contact.phone_number')),
        //     //         'email' => strip_tags($this->input('emergency_contact.email')),
        //     //         'address' => strip_tags($this->input('emergency_contact.address')),
        //     //     ];
        //     // }

        //     // // Merge data only if emergency contact is not empty
            // $dataToMerge = [
                    // 'personal_info' => array_merge($this->input('personal_info'), $personalInfo)
        //     //     'permanent_address' => $permanentAddress,
        //     //     'current_address' => $currentAddress,
        //     // ];
        //     // if (!empty($emergencyContact)) {
        //     //     $dataToMerge['emergency_contact'] = $emergencyContact;
        //     // }
            $dataToMerge = [
                'personal_info' => array_merge($this->input('personal_info'), $personalInfo)
            ];

            $this->merge($dataToMerge);

            Log::info(
                "After merging "  . json_encode($this->all())
            );
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

        Log::info($this);

        
        if ($this->input('personal_info.user_type') === 'driver') {
            $rules = array_merge($rules, [
                "emergency_contact.full_name" => "required|string|max:100",
                "emergency_contact.relationship" => "required|string|max:100",
                "emergency_contact.phone_number" => "required|string|max:12",
                "emergency_contact.email" => "required|email",
                "emergency_contact.address" => "required|string|max:255"
                // "driver.nbi_license" => "required|file",
                // "driver.license" => "required|file",
                // "driver.lto_driving_history" => "required|file"
            ]);
        }

        if ($this->input('personal_info.user_type') === 'client') {
            $rules = array_merge($rules, [
                // "company_name" => 'required|string|max:255',
                // "company_registration_number" => 'required|string|max:50',
                // "client_document" => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);
        }

        Log::info("Setting up data");

        return $rules;
    }
}
