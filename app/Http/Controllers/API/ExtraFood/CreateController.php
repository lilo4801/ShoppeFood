<?php

namespace App\Http\Controllers\API\ExtraFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\ExtraFood\CreateRequest;
use App\Services\ExtraFood\CreateService;


class CreateController extends BaseApiController
{
    protected $service;

    public function __construct(CreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(CreateRequest $request)
    {
        if ($this->service->execute($request->validated())) {
            return $this->sendSuccess();
        }

        return $this->sendError();
    }

}
