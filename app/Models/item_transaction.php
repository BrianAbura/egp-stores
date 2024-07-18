<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_transaction extends Model
{
    use HasFactory;
    public function item_details()
    {
        return $this->belongsTo(items::class, 'items_id');
    }
}
