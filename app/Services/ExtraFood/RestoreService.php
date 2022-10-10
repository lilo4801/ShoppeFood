<?php


namespace App\Services\ExtraFood;


use App\Models\ExtraFood;

class RestoreService
{
    public function execute(int $food_id)
    {
        try {
            ExtraFood::withTrashed()->where('id', $food_id)->restore();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
