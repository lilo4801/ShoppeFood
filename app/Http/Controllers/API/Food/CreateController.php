<?php


namespace App\Http\Controllers\API\Food;


use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Food\CreateRequest;
use App\Services\Food\CreateService;

class CreateController extends BaseApiController
{
    protected $service;

    public function __construct(CreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(CreateRequest $request)
    {
        $res = $this->service->execute($request->validated());
        if (!$res) {
            return $this->sendError([], 'Failure to create food !!!');
        }
        return $this->sendSuccess([], 'Food has been created');
    }
}
