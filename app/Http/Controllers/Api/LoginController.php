<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request) 
    {
        /** @var User $user */
        $user = User::where('email', '=', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        } 
        else {
            $token = $user->createToken('auth-token');
            return response()->json([
                'message' => 'Success',
                'user' => $user,
                'token' => $token->plainTextToken,
            ], 200);
        }
    }

}
