<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = $request->user();

        $token = $user->createToken("auth_token")->plainTextToken;

        return response()->json([
            "data" => [
                "type" => "token",
                "attributes" => [
                    "token" => $token,
                    "token_type" => "Bearer"
                ]
            ],
            "included" => [
                [
                    "id" => $user->id,
                    "type" => "usuario",
                    "attributes" => [
                        "name" => $user->name,
                        "email" => $user->email
                    ]
                ]
            ]
        ], 200);
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(null,204);
    }
}
