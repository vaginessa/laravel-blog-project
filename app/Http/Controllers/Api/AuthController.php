<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Validator;
use App\User;

class AuthController extends Controller
{
    public function signin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->messages()], 400);
        }

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid Credentials'], 401);
            }
        } catch (JWTException  $e) {
            return response()->json(['message' => 'Could not create token'], 500);
        }

        $user = User::where('email', $request->email)->first();
        return response()->json(['token' => $token, 'message' => 'User signed in.', 'user' => $user]);
    }
}
