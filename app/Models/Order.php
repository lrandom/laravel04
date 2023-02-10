<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING = 1;
    const STATUS_SHIPPING = 2;
    const STATUS_DELIVERED = 3;
    const STATUS_CANCELED = 4;
    use HasFactory;

    protected $fillable = [
        'received_name',
        'received_phone',
        'received_address',
        'sub_total',
        'tax',
        'total',
        'status'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderProduct::class);
    }


}
