<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	$user = User::create($request->only('first_name', 'last_name', 'email', 'password'));

    	return [
    		'success' => true,
    		'data' => $user->toArray()
    	];
    }
}
