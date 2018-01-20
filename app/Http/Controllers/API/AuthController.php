<?php

namespace HireCarer\Http\Controllers\API;

use HireCarer\Http\Controllers\Controller;
use HireCarer\Http\Requests\SignupFormRequest;
use HireCarer\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    /**
     * Sign up user
     * @param SignupFormRequest $request [description]
     * @return \Illuminate\Http\JsonResponse [type]           [description]
     */
    public function signup(SignupFormRequest $request)
    {

    	try {
    		$user = new User;
    		$user->name = $request->get('name');
    		$user->email = $request->get('email');
    		$user->password = \Hash::make($request->get('password'));
    		$user->save();

    		return response()->json([
    			'user' => $user
    		], 201);
    	} catch (Exception $e) {
    		return response()->json([
    			'message' => 'Something went wrong. Please try again.'
    		], 503);
    	}
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signin(Request $request)
    {
    	// grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Login credentials are incorrect.'], 401);
            }
            $name = User::whereEmail($request->get('email'))->limit(1)->first()->name;

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
        return response()->json(compact('token', 'name'));
    }
}
