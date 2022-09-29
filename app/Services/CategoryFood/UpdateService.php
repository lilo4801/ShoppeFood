<?php


namespace App\Services\CategoryFood;


use App\Models\CategoryFood;

class UpdateService
{
    public function execute(array $payload, int $id)
    {
        try {

            $categoryFood = CategoryFood::find($id);
            if (!$categoryFood) {
                return false;
            }

            $categoryFood->update($payload);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
