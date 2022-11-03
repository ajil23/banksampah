<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiDawis extends Model
{
    use HasFactory;
    protected $table = 'transaksi_dawis';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
