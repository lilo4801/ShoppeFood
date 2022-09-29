<?php


namespace App\Services\CategoryFood;


use App\Models\CategoryFood;

class RemoveService
{
    public function execute(int $id)
    {
        try {
            CategoryFood::find($id)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
