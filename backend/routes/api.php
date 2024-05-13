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

//----------------------------------Routes for Users------------------------------

Route::apiResource('/user', UserController::class); //url for UserController || define routes for CRUD operations 

// Route to approve account
Route::put('/user/approve/{id}', [UserController::class, 'approveAccount']); //Dito ung reference na galing sa UserController.php

// Route to deny account
Route::put('/user/deny/{id}', [UserController::class, 'denyAccount']); //Dito ung reference na galing sa UserController.php

Route::post('/user/send-account-denied-email', [MailController::class, 'sendAccountDeniedEmail']); //icheck kung need ng id dito

Route::post('/user/send-account-approved-email', [MailController::class, 'sendAccountApprovedEmail']); //icheck kung need ng id dito

//Route in validating the token in Revise Documents.
Route::get('/user/validate-token/{token}', [UserController::class, 'validateToken']);

Route::post('/user/generate-random-password/{id}', [UserController::class, 'generateRandomPassword']);

//Route for Dashboard
Route::get('/total-client-users-count', [UserController::class, 'getTotalClientUsersCount']);

Route::get('/total-driver-users-count', [UserController::class, 'getTotalDriverUsersCount']);

Route::get('/total-helper-users-count', [UserController::class, 'getTotalHelperUsersCount']);

Route::put('/user/account-recover/{id}', [UserController::class, 'accountRecover']); //Dito ung reference na galing sa UserController.php


//----------------------------------Routes for Logs--------------------------------
Route::apiResource('/logs', LogsController::class); //url for LogsController || define routes for CRUD operations 

//----------------------------------API Routes------------------------------------------
//<project url>/api/resgister
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


