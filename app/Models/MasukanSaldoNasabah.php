<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukanSaldoNasabah extends Model
{
    use HasFactory;
    protected $table = 'masukan_saldo_nasabah';
    protected $primaryKey = 'id';
    public $timestamps = true;
}

