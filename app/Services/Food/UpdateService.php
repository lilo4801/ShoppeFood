<?php


namespace App\Services\Food;


use App\Models\Food;
use App\Models\FoodImage;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    public function execute(array $payload)
    {
        DB::beginTransaction();
        try {
            Food::find($payload['food_id'])->update($payload);

            if ($delImageIds = data_get($payload, 'del_image_id')) {
                FoodImage::destroy($delImageIds);
            }

            $dataImage = array_map(function ($item) use ($payload) {
                return ['path' => $item, 'food_id' => data_get($payload, 'food_id')];
            }, data_get($payload, 'images', []));

            if ($dataImage) {
                FoodImage::insert($dataImage);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
