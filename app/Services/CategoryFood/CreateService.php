<?php


namespace App\Services\CategoryFood;


use App\Models\CategoryFood;

class CreateService
{
    public function execute(array $payload)
    {
        try {
            CategoryFood::create($payload);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
