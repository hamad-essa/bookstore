<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
            ],
            'password' => 'required|string',
            'api_key' => 'required',
        ]);

        // Simple Api Key Auth
        $api_key = 'f1aae435-79a4-4731-88ee-fcb28131b8de';
        if ($request->api_key !== $api_key) {
            return response()->json(['message' => 'Invalid API key'], 401);
        }

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $responseMessage = $request->query('lang') === 'ar' ? 'بيانات الدخول غير صحيحة!' : 'Invalid credentials';
            return response()->json(['message' => $responseMessage, 'errors' => $errors], 422);
        }

        // Authenticate the user with Sanctum
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user,
            ]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

}
