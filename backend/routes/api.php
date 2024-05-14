<?php

use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController; //Walang API na folder directory
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ApiController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Routes for Users
Route::prefix('user')->group(function () {
    // Define routes for CRUD operations using apiResource
    Route::apiResource('/', UserController::class); //Api CRUD scaffolfing
    
    Route::get('/{id}', [UserController::class, 'show']); // Display the specific ID
    Route::put('/approve/{id}', [UserController::class, 'approveAccount']);
    Route::put('/deny/{id}', [UserController::class, 'denyAccount']);
    Route::get('/validate-token/{token}', [UserController::class, 'validateToken']);
    Route::post('/generate-random-password/{id}', [UserController::class, 'generateRandomPassword']);
    Route::put('/account-recover/{id}', [UserController::class, 'accountRecover']);

    // Dashboard routes
    Route::get('/total-client-users-count', [UserController::class, 'getTotalClientUsersCount']);
    Route::get('/total-driver-users-count', [UserController::class, 'getTotalDriverUsersCount']);
    Route::get('/total-helper-users-count', [UserController::class, 'getTotalHelperUsersCount']);

    // Mail Routes
    Route::post('/send-account-denied-email', [MailController::class, 'sendAccountDeniedEmail']);
    Route::post('/send-account-approved-email', [MailController::class, 'sendAccountApprovedEmail']);
});


// Dashboard related routes
Route::prefix('dashboard')->group(function () {
    Route::get('/total-client-users-count', [UserController::class, 'getTotalClientUsersCount']);
    Route::get('/total-driver-users-count', [UserController::class, 'getTotalDriverUsersCount']);
    Route::get('/total-helper-users-count', [UserController::class, 'getTotalHelperUsersCount']);
});

//Logs related routes
Route::prefix('admin')->group(function () {
    Route::apiResource('/logs', LogsController::class);
}); //url for LogsController || define routes for CRUD operations 

//API Related Routes
Route::post("register", [ApiController::class, "register"]); //open method so no need ng middleware
Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"] //validate if valid or not. If valid didiretso sa route sa baba.
], function(){

    //Before calling this routes we need a token value generated from the login API | Kailangan ng token para maaccess tong mga to
    Route::get("profile", [ApiController::class, "profile"]);
    Route::get("refresh", [ApiController::class, "refreshToken"]);
    Route::get("logout", [ApiController::class, "logout"]);
});


