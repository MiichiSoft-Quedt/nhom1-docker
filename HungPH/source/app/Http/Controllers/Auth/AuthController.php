<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'name' => 'required|string',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|max:30'
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        
        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
        ]);

        return response() -> json([
            'data' => $user,
        ]);
    }

    public function login(Request $request){
        $user = $request->only('email', 'password');

        try {
            if(!$token = Auth::attempt($user)){
                return response()->json([
                    'error' => 'invalid credentials',
                ], 400);
            }
        } catch (Exception $e) {
            return response() ->json([
                'error' => 'could not create token'
            ], 400);
        }

        return response()->json([
            'data' => $user,
            'token' => $token
        ]);
    }

    public function logout(){
        auth()->logout();
        return response()->json([
            'message' => 'Logout succesfully'
        ]);
    }

    public function user(){
        return response()->json(Auth::user());
    }
}
