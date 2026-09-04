<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
        public function __construct(protected AuthServices $authServices){
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|string|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }
        $result = $this->authServices->register($validator->validator());
        return response()->json($result,201);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }
        $result = $this->authServices->login($validator->validator());

        if (! $result) {
            return response()->json(['message' => 'Invalid credentials'],401);
        }
        return response()->json($result);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
