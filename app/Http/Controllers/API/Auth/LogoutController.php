<?php


namespace App\Http\Controllers\API\Auth;


use App\Http\Controllers\API\BaseApiController;

class LogoutController extends BaseApiController
{
    public function __invoke()
    {
        auth()->user()->tokens()->delete();
        return $this->sendSuccess();
    }
}
