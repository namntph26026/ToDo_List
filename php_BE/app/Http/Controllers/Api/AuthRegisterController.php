<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthRegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:2'],
        // ]);
        $user = $request->all();


        $existingRecord = DB::table('users')
            ->where('email', $user['email'])
            ->whereNotNull('deleted_at')
            ->first();
        if ($existingRecord) {
            DB::table('users')
                ->where('id', $existingRecord->id)
                ->update(['deleted_at' => null]);

            
            DB::table('users')
            ->where('id', $existingRecord->id)
            ->update([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);
            $updatedUser = User::find($existingRecord->id);
            Mail::to($updatedUser->email)->send(new AccountCreated($updatedUser));

            return response()->json(['message' => 'Khôi phục bản ghi thành công']);
        } else {
            $user =  User::create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            Mail::to($user->email)->send(new AccountCreated($user));
            return response()->json(['message' => 'Đăng kí tài khoản thành công !!'], 200);
        }
    }

    public function checkMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return response()->json(['exists' => true], 200);
        } else {
            return response()->json(['exists' => false], 422);
        }
    }
}
