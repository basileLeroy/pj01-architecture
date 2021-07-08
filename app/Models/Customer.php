<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchase_id',
        'payment_status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street',
        'city',
        'region',
        'postal',
        'country',
        'delivery_status',
    ];
}
