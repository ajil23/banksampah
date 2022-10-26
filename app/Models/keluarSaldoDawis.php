<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluarSaldoDawis extends Model
{
    use HasFactory;
    protected $table = 'keluar_saldo_dawis';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
