<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukansaldoPetugas extends Model
{
    use HasFactory;
    protected $table = 'masukan_saldo_petugas';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
