<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(purchase_order::class, 'purchase_order_id');
    }
}
