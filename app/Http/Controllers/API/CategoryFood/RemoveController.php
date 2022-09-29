<?php

namespace App\Http\Controllers\API\CategoryFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\CategoryFood\RemoveCategoryFoodRequest;
use App\Services\CategoryFood\RemoveService;


class RemoveController extends BaseApiController
{
    protected $service;

    public function __construct(RemoveService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RemoveCategoryFoodRequest $request, int $id)
    {
        $res = $this->service->execute($id);
        if (!$res) {
            return $this->sendError([], 'Failure to remove category food');
        }
        return $this->sendSuccess([], 'Category food has been removed');
    }
}
