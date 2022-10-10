<?php


namespace App\Services\ExtraFood;


use App\Models\ExtraFood;

class DeleteService
{
    public function execute(int $id): ?bool
    {
        try {
            ExtraFood::find($id)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
