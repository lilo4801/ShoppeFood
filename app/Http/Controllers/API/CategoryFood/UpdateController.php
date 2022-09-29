<?php

namespace App\Http\Controllers\API\CategoryFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\CategoryFood\UpdateCategoryFoodRequest;
use App\Services\CategoryFood\UpdateService;

class UpdateController extends BaseApiController
{
    protected $service;

    public function __construct(UpdateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateCategoryFoodRequest $request, int $id)
    {
        $res = $this->service->execute($request->validated(), $id);
        if (!$res) {
            return $this->sendError([], 'Failure to update category food ');
        }
        return $this->sendSuccess([], 'Category food has been updated');
    }
}
