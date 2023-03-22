<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'string|required|min:6',
            'username' => 'string|required|min:8|unique',
            'password' => 'required|string|confirmed',
            'email' => 'email|required|unique:users'
        ]);
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);
        return response()->json([
            'success' => 'true',
            'data' => 'Successful user creation'
        ]);
    }
}
