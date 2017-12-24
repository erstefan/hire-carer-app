<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupFormRequest;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

	/**
	 * Sign up user
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function signup(Request $request)
    {
    	// try {
    	// 	User::create($request->only('name', 'email', 'password'));
    	// 	return response()->json([
    	// 		'token' => '9120u08udihasjbdkhaskld'
    	// 	], 201);
    	// } catch (Exception $e) {
    	// 	return response()->json([
    	// 		'message' => 'Something went wrong. Please try again.'
    	// 	], 503);
    	// }
    }

    public function signin()
    {

    }
}
