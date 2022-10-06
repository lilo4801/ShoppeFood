<?php

namespace App\Http\Controllers\API\Food;

use App\Http\Controllers\API\BaseApiController;
use App\Services\Food\FetchDetailService;
use Illuminate\Http\Request;

class FetchDetailController extends BaseApiController
{
    protected $service;

    public function __construct(FetchDetailService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request, int $foodID)
    {
        $res = $this->service->execute($foodID);

        return $this->sendSuccess($res);

    }
}
