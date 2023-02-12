<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [

        'customer_id',
        'name',
        'zipcode',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',

    ];
}
