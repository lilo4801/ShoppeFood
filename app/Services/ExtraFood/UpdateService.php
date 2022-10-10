<?php


namespace App\Services\ExtraFood;


use App\Models\ExtraFood;

class UpdateService
{
    public function execute(array $payload, int $food_id)
    {
        try {
            ExtraFood::find($food_id)->update($payload);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
