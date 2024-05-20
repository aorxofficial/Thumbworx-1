<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRegistrationRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $token = Auth::guard('admin')->attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if (!$token) {
            return response()->json([
                "status" => false,
                "message" => "Invalid credentials"
            ]);
        }

        return $this->responseWithToken($token);
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

        if (!$admin) {
            return response()->json([
                'status' => 'failed',
                'message' => "An error occured while trying to create admin"
            ], 500);
        }

        $token = JWTAuth::fromUser($admin);

        return response()->json([
            "message" => "Created admin account.",
            "token" => $this->responseWithToken($token),
        ]);
        
    }

    public function refresh()
    {
        $token = Auth::guard('admin')->refresh();
        return $this->responseWithToken($token);
    }

    public function responseWithToken($token) 
    {
        return response()->json([
            'status' => 'success',
            'token' => $token,
            'type' => 'bearer',
        ]);
    }
}
