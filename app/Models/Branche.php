<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
