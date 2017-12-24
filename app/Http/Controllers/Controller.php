<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * Create the response for when a request fails validation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $errors
     * @return \Illuminate\Http\Response
     */
    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return new JsonResponse($errors, 422);
        }

        return redirect()->to($this->getRedirectUrl())
                        ->withInput($request->input())
                        ->withErrors($errors, $this->errorBag());
    }
}
