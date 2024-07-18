<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_order extends Model
{
    use HasFactory;
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function items()
    {
        return $this->hasMany(product::class, 'purchase_order_id');
    }

    // public function items()
    // {
    //     return $this->hasMany(items::class, 'purchase_order_id');
    // }
}
