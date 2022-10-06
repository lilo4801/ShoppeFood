<?php


namespace App\Services\Food;


use App\Models\Food;

class FetchFoodStoreService
{
    public function execute(int $storeId): array
    {
        return Food::with('food_images')->where('store_id', $storeId)->get()->toArray();
    }
}
