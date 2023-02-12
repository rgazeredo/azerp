<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'reinforcement',
        'print',
        'colors',
        'color1',
        'color2',
        'roll_quantity',
        'roll_weight',
        'roll_length',
        'active',
    ];
}
