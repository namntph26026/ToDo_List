<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InforUserController extends Controller
{
    //
    public function changeEmail(Request $request)
    {
        $userId = Auth::id();
         
        $user = User::where('id', $userId)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }
        
        if (!Hash::check($request->password1, $user->password)) {
            return response()->json([
                'message' => 'Mật khẩu không khớp'
            ], 422);
        }
        
        if (!$request->has('email')) {
            return response()->json([
                'message' => 'Vui lòng cung cấp email mới'
            ], 422);
        }
        
        $success = $user->update(['email' => $request->email]);
        
        if ($success) {
            return response()->json([
                'message' => 'Thay đổi email thành công'
            ],200);
        } else {
            return response()->json([
                'message' => 'Không thể cập nhật email'
            ], 500);
        }
    }

    public function changePassword(Request $request)
    {
        $userId = Auth::id();
         
        $user = User::where('id', $userId)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }
        
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Mật khẩu không khớp'
            ], 422);
        }
        
        if (!$request->has('password')) {
            return response()->json([
                'message' => 'Vui lòng cung cấp password mới'
            ], 422);
        }
        
        $success = $user->update(['password' => $request->passwordnew]);
        
        if ($success) {
            return response()->json([
                'message' => 'Thay đổi password thành công'
            ],200);
        } else {
            return response()->json([
                'message' => 'Không thể cập nhật password'
            ], 500);
        }
    }
} 
