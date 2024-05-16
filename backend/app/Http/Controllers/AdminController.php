<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRegistrationRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function index()
    {

    }

    public function login()
    {
        return response()->json([
            'data' => "Supposed login."
        ]);
    }

    public function register(AdminRegistrationRequest $request)
    {
        $admin = Admin::create([
            "first_name" => $request->input('first_name'),
            "middle_name" => $request->input('middle_name'),
            "last_name" => $request->input('last_name'),
            "birth_date" => $request->input('birth_date'),
            "email" => $request->input('email'),
            "gender" => $request->input('gender'),
            "marital_status" => $request->input('marital_status'),
            "password" => bcrypt($request->input('password')),
        ]);


        return response()->json([
            "message" => "Created admin account.",
            "admin" => $admin,   
        ]);
    }
}
