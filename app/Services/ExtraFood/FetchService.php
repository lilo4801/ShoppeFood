<?php


namespace App\Services\ExtraFood;


use App\Models\ExtraFood;

class FetchService
{
    public function execute(int $food_id)
    {
        return ExtraFood::where('food_id', $food_id)->get()->toArray();
    }
}
