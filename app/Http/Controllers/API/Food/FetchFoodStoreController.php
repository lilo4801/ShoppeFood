<?php

namespace App\Http\Controllers\API\Food;

use App\Http\Controllers\API\BaseApiController;
use App\Services\Food\FetchFoodStoreService;


class FetchFoodStoreController extends BaseApiController
{
    protected $service;

    public function __construct(FetchFoodStoreService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $storeId)
    {
        $res = $this->service->execute($storeId);
        return $this->sendSuccess($res);
    }
}
