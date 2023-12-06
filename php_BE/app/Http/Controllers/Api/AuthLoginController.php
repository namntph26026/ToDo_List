<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthLoginController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => "Sai tài khoản hoặc mật khẩu"
            ], 422);
        }
    
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    public function Logout(){
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Đăng xuất thành công !!'],200);
    }
}
