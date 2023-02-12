<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'iss',
        'irpj',
        'csll',
        'icms',
        'ipi',
        'pis',
        'cofins',
        'active',
    ];
}
