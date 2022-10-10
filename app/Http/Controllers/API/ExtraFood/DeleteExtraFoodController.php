<?php

namespace App\Http\Controllers\API\ExtraFood;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\ExtraFood\RemoveRequest;
use App\Services\ExtraFood\DeleteService;

class DeleteExtraFoodController extends BaseApiController
{
    protected $service;

    public function __construct(DeleteService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RemoveRequest $request, int $food_id)
    {
        $res = $this->service->execute($food_id);

        if (!$res) {
            return $this->sendError();
        }

        return $this->sendSuccess([], 'Extra food has been removed!');
    }

}
