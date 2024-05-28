<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User; //IMPORTING THE USER MODEL CLASS | Hindi ginamit dito kasi walang register
use Illuminate\Support\Facades\Hash; //Hashing the password | Hindi rin ginamit dito kasi sa register of password eto. Maybe sa UserController pwede
use Tymon\JWTAuth\Facades\JWTAuth; 

class ApiController extends Controller
{
      // Login API (POST, formdat) | Open methods
      public function login(Request $request){
        
        // data validation | Sa form eto
        $request->validate([ 
            "email" => "required|email",
            "password" => "required"
        ]);

        // JWTAuth | chinecheck kung existing ba eto sa DB if it exist it will return a JWT Token
        $token = JWTAuth::attempt([ //Default User table sya tumitingin
            "email" => $request->email,
            "password" => $request->password
        ]);

        if (!empty($token)) {

            //Eto ung lumalabas kapag successful yung login
            return response()->json([
                "status" => true,
                "message" => "User logged in successfully",
                "token" => $token, //Generating random token
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Invalid details"
        ]);
    }

    public function register(RegistrationRequest $request) {
        return response()->json([
            "message" => "Form valid"
        ]);
    }
    

    //Profile API (GET) | Protected methods
    public function profile(){ //Kapag tinawag mo to ireread nya ung user details

        $userdata = auth()->user();

        return response()->json([
            "status" => true,
            "message" => "Profile data",
            "data" => $userdata
        ]);
    } 

    //Refresh Token API (GET) | Protected methods | New token and destroys old
    public function refreshToken(){
        
        $newToken = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "New access token",
            "token" => $newToken
        ]);
    }

    //Logout API (GET) | Protected 
    // This is not needed for JWT as logouts are completely managed client side.
    // public function logout(){
        
    //     auth()->logout();

    //     return response()->json([
    //         "status" => true,
    //         "message" => "User logged out successfully"
    //     ]);
    // }
}
