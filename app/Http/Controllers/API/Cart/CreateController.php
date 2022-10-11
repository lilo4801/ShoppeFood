<?php

namespace App\Http\Controllers\API\Cart;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Cart\CreateRequest;
use App\Services\Cart\CreateService;

class CreateController extends BaseApiController
{
    protected $service;

    public function __construct(CreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(CreateRequest $request)
    {
        if (!$this->service->execute()) {
            return $this->sendError();
        }
        return $this->sendSuccess();
    }
}
