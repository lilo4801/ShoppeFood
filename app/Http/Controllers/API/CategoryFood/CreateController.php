<?php

namespace App\Http\Controllers\API\CategoryFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\CategoryFood\CreateCategoryFoodRequest;
use App\Services\CategoryFood\CreateService;
use Illuminate\Http\Request;

class CreateController extends BaseApiController
{
    protected $categoryFoodService;

    public function __construct(CreateService $categoryFoodService)
    {
        $this->categoryFoodService = $categoryFoodService;
    }

    public function __invoke(CreateCategoryFoodRequest $request)
    {
        $res = $this->categoryFoodService->execute($request->validated());
        if (!$res) {
            return $this->sendError([], 'Failure to create category food', 401);
        }

        return $this->sendSuccess([], 'Category food has been created!');
    }
}
