<?php

namespace App\Http\Controllers\API\ExtraFood;

use App\Http\Controllers\API\BaseApiController;
use App\Services\ExtraFood\FetchService;

class FetchExtraFoodController extends BaseApiController
{
    protected $service;

    public function __construct(FetchService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $food_id)
    {
        return $this->sendSuccess($this->service->execute($food_id));
    }
}
