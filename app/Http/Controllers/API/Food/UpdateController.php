<?php

namespace App\Http\Controllers\API\Food;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Food\UpdateRequest;
use App\Services\Food\UpdateService;

class UpdateController extends BaseApiController
{
    protected $service;

    public function __construct(UpdateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateRequest $request)
    {
        $res = $this->service->execute($request->validated());

        if (!$res) {
            return $this->sendError();
        }

        return $this->sendSuccess();

    }

}
