<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\ForgotPassword;

use App\Mail\ForgotPasswordTokenMail;

class ForgotPasswordController extends Controller
{
    public function sendMail(Request $request)
    {
        $checkIfEmailExist = User::where('email', $request->email)->first();
        if($checkIfEmailExist){
            $token = time().Str::random(30);

            $forgotPassword = new ForgotPassword;
            $forgotPassword->email = $request->email;
            $forgotPassword->token = $token;
            $forgotPassword->status = 1;
            $forgotPassword->save();

            Mail::to($request->email)->send(new ForgotPasswordTokenMail ($token));
            return view('auth.passwords.reset', compact('token'));
        }else{
            return "Please provide the email you used to create account..!";
        }
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'email|required',
            'password' => 'required|confirmed',
        ]);

        $checkToken = ForgotPassword::where('email', $request->email)->where('token', $request->token)->where('status', 1)->first();

        if($checkToken){
            $updatePassword = User::where('email', $request->email)->first();
            $updatePassword->password = Hash::make($request->password);
            $updatePassword->save();
            $checkToken->status = 0;
            $checkToken->save();
            return "Password Updated Successfully. Please login now";
        }else{
            return "Your provided token did not matched or you used this token before. Please use valid, latest token from your email.";
        }

    }
}