<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    use HasFactory;

    protected $table = 'category_foods';

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

}
