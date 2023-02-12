<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GummedTape extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'boxes',
        'reinforced_50',
        'reinforced_60',
        'reinforced_70',
        'reinforced_80',
        'unreinforced_50',
        'unreinforced_60',
        'unreinforced_70',
        'unreinforced_80',
    ];
}
