<?php


namespace App\Services\Store;


use App\Models\Store;

class CreateService
{
    public function execute(array $payload)
    {
        try {
            $payload['user_id'] = auth()->user()->id;
            Store::create($payload);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
