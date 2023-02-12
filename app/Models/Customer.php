<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
        'sector_id',
        'wallet_id',
        'user_id',
        'customer_status_id',
        'customer_statuses',
        'customer_profile_id',
        'customer_profiles',
        'type',
        'ein',
        'company_name',
        'name',
        'company_type',
        'email',
        'phone',
        'extention',
        'whatsapp',
        'primary_cfop',
        'birthday',
        'gender',
        'ipi_immune',
        'approved_product',
        'credit',
        'art_print',
        'comment',
        'discount'
    ];
}
