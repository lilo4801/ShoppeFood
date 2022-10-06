<?php


namespace App\Services\Food;


use App\Models\Food;

class FetchDetailService
{
    public function execute(int $foodId): array
    {
        return Food::with('food_images')->find($foodId)->toArray();
    }
}
