<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request){
       
       
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' =>'User registered successfully',
            'token' => $token,
            'user' => $user         
        ]);
        
    }
}
