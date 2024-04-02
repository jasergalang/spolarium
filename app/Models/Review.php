<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'stars'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
