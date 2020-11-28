<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\User;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getResetToken(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $user=User::where('email',$request->email)->first();
        if($user)
        {
            $sent = $this->sendResetLinkEmail($request);

            return ($sent) 
                ? response()->json(['status'=>true,'message'=>'Success'])
                : response()->json(['status'=>false,'message'=>'Failed']);
    
        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'Email does not exist']);

        }

    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT ? 1 : 0;
    }
}
