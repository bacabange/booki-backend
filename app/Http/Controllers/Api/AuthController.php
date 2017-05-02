<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Requests\Api\RegisterUserRequest;
use App\Http\Requests\Api\LoginUserRequest;


class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
    	$user = User::create($request->only('first_name', 'last_name', 'email', 'password'));

    	return [
    		'success' => true,
    		'data' => [
    			'token' => $user->token_jwt
    		]
    	];
    }

    public function login(LoginUserRequest $request)
    {

    	if ( ! $token = JWTAuth::attempt($request->only('email', 'password'))) {
    		return response()->json([
    			'success' => false,
    			'error' => 'wrong email or password.'
    		], 422);
    	}

    	return [
    		'success' => true,
    		'data' => [
    			'token' => $token
    		]
    	];
    }
}
