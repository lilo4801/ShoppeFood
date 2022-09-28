<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Services\Auth\RegisterService;


class RegisterController extends BaseApiController
{

    protected $registerService;

    public function __construct()
    {
        $this->registerService = new RegisterService();
    }


    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterAuthRequest $request)
    {

        $user = $this->registerService->execute($request->validated());

        $token = $user->createToken('myapptoken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token,
        ];
        return $this->sendSuccess($res);
    }
}
