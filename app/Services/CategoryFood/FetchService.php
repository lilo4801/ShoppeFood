<?php


namespace App\Services\CategoryFood;


use App\Models\CategoryFood;

class FetchService
{
    public function execute(): array
    {
        return CategoryFood::all()->toArray();
    }
}
