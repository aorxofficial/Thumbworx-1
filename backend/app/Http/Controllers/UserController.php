<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash; // For hashing
use Illuminate\Support\Str; // Import the Str class

class UserController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->user = new User(); //Connecting to User model

    }

    public function index()
    {
        return $this->user->all();  //returns all records 
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        return $user = $this->user->find($id);
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->update($request->all()); // Update the user with request data
        return $user; // Return the updated user
    }

    public function destroy(string $id)
    {
        //
    }

    public function approveAccount(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['account_status' => 1]); // Update account_status to 1
        return $user;
    }

    public function denyAccount(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['account_status' => 2]); // Update account_status to 2
        return $user;
    }

    //method for revise document token
    public function validateToken(string $token)
    {
        $user = $this->user->where('token', $token)->first();

        if ($user) {
            return response()->json(['valid' => true], 200);
        } else {
            return response()->json(['valid' => false], 404);
        }
    }

    public function generateRandomPassword(Request $request, $id)
    {
        // Generate a random password
        $randomPassword = Str::random(8); // Generates an 8-character random alphanumeric password

        // Hash the generated password
        $hashedPassword = Hash::make($randomPassword);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's password field with the hashed password
        $user->password = $hashedPassword;
        $user->save(); // Save the user

        // Return response
        return response()->json(['password' => $randomPassword, 'hashed_password' => $hashedPassword], 200);
    }

    public function getTotalClientUsersCount()
    {
        $clientCount = $this->user->where('user_type', 'Client')->count(); // Get the count of users with user_type 'Client'
        return response()->json(['total_client_users' => $clientCount], 200);
    }

    public function getTotalDriverUsersCount()
    {
        $driverCount = $this->user->where('user_type', 'Driver')->count(); // Get the count of users with user_type 'Client'
        return response()->json(['total_driver_users' => $driverCount], 200);
    }

    public function getTotalHelperUsersCount()
    {
        $helperCount = $this->user->where('user_type', 'Helper')->count(); // Get the count of users with user_type 'Client'
        return response()->json(['total_helper_users' => $helperCount], 200);
    }

    public function accountRecover(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['is_restore' => 0]); // Update is_recover to 0
        return $user;
    }

    public function terminateAccount(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['account_status' => 3]); 
        return $user;
    }

    public function cancelAccount(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['account_status' => 4]); 
        return $user;
    }

    public function blockAccount(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['account_status' => 5]); 
        return $user;
    }

    public function freezeAccount(string $id)
    {
        $user = $this->user->find($id); //  $this->user is User model instance
        $user->update(['account_status' => 6]); 
        return $user;
    }



}
