<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_pizza extends Model
{
    use HasFactory;
    protected $table = 'order_pizza';
    protected $primaryKey = 'id';
}
