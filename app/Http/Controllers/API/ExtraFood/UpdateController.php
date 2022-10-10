<?php

namespace App\Http\Controllers\API\ExtraFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\ExtraFood\UpdateRequest;
use App\Services\ExtraFood\UpdateService;

class UpdateController extends BaseApiController
{
    protected $service;

    public function __construct(UpdateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateRequest $request, int $food_id)
    {
        if (!$this->service->execute($request->validated(), $food_id)) {
            return $this->sendError();
        }
        return $this->sendSuccess();
    }

}
