<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReset as MailPasswordReset;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    //
    public function reset(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Email không tồn tại'], 404);
        }

        $password = Str::random(10); // Mật khẩu ngẫu nhiên

        $user->password = Hash::make($password);
        $user->save();

        // Gửi email chứa mật khẩu đến người dùng
        Mail::to($user->email)->send(new MailPasswordReset($user, $password));

        return response()->json(['message' => 'Mật khẩu đã được đặt lại và gửi đến email của người dùng'],200);
    }
}
