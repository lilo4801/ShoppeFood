<?php

namespace App\Http\Controllers\API\ExtraFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\ExtraFood\RestoreRequest;
use App\Services\ExtraFood\RestoreService;


class RestoreExtraFoodController extends BaseApiController
{
    protected $service;

    public function __construct(RestoreService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RestoreRequest $request, int $food_id)
    {
        if (!$this->service->execute($food_id)) {
            return $this->sendError();
        }
        return $this->sendSuccess([], 'Extra food has been restored');
    }
}
