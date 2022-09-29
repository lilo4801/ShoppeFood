<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'title',
        'content',
        'unitPrice',
        'quantity',
        'user_id',
        'category_food_id',
        'store_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function food_images(): HasMany
    {
        return $this->hasMany(FoodImage::class, 'food_id', 'id');
    }
}
