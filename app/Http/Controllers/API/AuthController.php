<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupFormRequest;
use App\User;
use Request;

class AuthController extends Controller
{

	/**
	 * Sign up user
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function signup(SignupFormRequest $request)
    {

    	// if(Request::wantsJson()){
     //            return "AJAX";
     //        }
     //        return "HTTP";
    	// $rules = [
     //        'name' => 'required|string|max:255',
     //        'email' => 'required|string|email|max:255|unique:users',
     //        'password' => 'required|string|min:6|confirmed',
     //    ];

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
