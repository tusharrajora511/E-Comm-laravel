<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'product_name',
        'product_id',
        'user_id',
        'status',
        'quantity',
        'price',
        'payment_status',
        'payment_method'
    ];
    
    protected $table = 'orders';
    public $timestamps = true;

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
