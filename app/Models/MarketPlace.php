<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketPlace extends Model
{
    use HasFactory;
    protected $table = 'marketplace';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
