<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtraFood extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'extra_foods';

    protected $fillable = [
        'title',
        'food_id',
        'unitPrice',
        'quantity',
        'user_id',
        'image',
    ];
}
