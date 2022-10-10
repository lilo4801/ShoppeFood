<?php


namespace App\Services\ExtraFood;


use App\Models\ExtraFood;

class CreateService
{
    public function execute(array $payload): bool
    {
        try {
            data_set($payload, 'user_id', auth()->user()->id);
            ExtraFood::create($payload);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
