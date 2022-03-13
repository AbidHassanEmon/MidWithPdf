<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }

    public function customer(){
        return $this->belongsTo(customer::class);
    }
}
