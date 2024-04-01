<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'order_id');
    }

    public function artwork(){

        return $this->belongsToMany(Artwork::class, 'artwork_order', 'artwork_id', 'order_id');
    }
}
