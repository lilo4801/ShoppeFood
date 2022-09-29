<?php


namespace App\Services\Food;


use App\Models\Food;
use App\Models\FoodImage;
use Illuminate\Support\Facades\DB;

class CreateService
{
    public function execute(array $payload)
    {
        DB::beginTransaction();
        try {

            $payload['user_id'] = auth()->user()->id;
            $dataImage = $payload['images'];
            unset($payload['images']);
            $food = Food::create($payload);

            $dataImage = array_map(function ($item) use ($food) {
                return ['path' => $item, 'food_id' => $food->id];
            }, $dataImage);
            FoodImage::insert($dataImage);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return false;
        }
    }
}
