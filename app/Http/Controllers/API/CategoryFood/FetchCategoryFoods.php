<?php

namespace App\Http\Controllers\API\CategoryFood;

use App\Http\Controllers\API\BaseApiController;
use App\Services\CategoryFood\FetchService;
use Illuminate\Http\Request;

class FetchCategoryFoods extends BaseApiController
{
    protected $fetchService;

    public function __construct(FetchService $fetchService)
    {
        $this->fetchService = $fetchService;
    }

    public function __invoke()
    {
        $res = $this->fetchService->execute();
        return $this->sendSuccess($res);
    }
}
