<?php

namespace App\Http\Controllers\API\Store;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Store\CreateRequest;
use App\Services\Store\CreateService;


class CreateController extends BaseApiController
{
    //
    protected $service;

    public function __construct(CreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(CreateRequest $request)
    {
        $res = $this->service->execute($request->validated());
        if (!$res) {
            return $this->sendError([], 'Failure to create store');
        }
        return $this->sendSuccess([], 'Store has been created');
    }
}
