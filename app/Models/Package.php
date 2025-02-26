<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = [
        'tracking_number',
        'sender_name',
        'sender_phone',
        'sender_email',
        'sender_address',
        'receiver_name',
        'receiver_phone',
        'receiver_email',
        'receiver_address',
        'parcel_description',
        'dispatch_location',
        'parcel_status',
        'dispatch_date',
        'delivery_date',
        'current_location',
    ];
}
