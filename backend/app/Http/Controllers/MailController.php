<?php

namespace App\Http\Controllers;
use App\Mail\AccountDeniedMail;
use App\Mail\AccountApprovedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendAccountDeniedEmail(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token'); // Get the token from the request
    
        $mailData = [
            'title' => 'Account Denied',
            'body' => 'A request to update the denied documents.',
            'token' => $token, // Pass the token to the email template
        ];
    
        // Update the token in the database
        User::where('email', $email)->update(['token' => $token]);
    
        Mail::to($email)->send(new AccountDeniedMail($mailData));
    
        return response()->json(['message' => 'Account denied email sent successfully'], 200);
    }
    

    public function sendAccountApprovedEmail(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $approvedMailData = [
            'title' => 'Account Approved',
            'body' => 'Your account has been approved.',
            'email' => $email, // Connecting and calling the email from the database
            'password' => $password, // Connecting and calling the password from the database
        ];

        Mail::to($email)->send(new AccountApprovedMail($approvedMailData));

        return response()->json(['message' => 'Account approved email sent successfully'], 200);
    }

    
}
