<?php


namespace App\Http\Controllers\API\Auth;


use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Services\Auth\LoginService;

class LoginController extends BaseApiController
{
    protected $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function __invoke(LoginAuthRequest $request)
    {
        $res = $this->loginService->execute($request->validated());

        if (!$res['success']) {
            return $this->sendError($res['data'], $res['message'], 401);
        }

        return $this->sendSuccess($res['data']);
    }

}
