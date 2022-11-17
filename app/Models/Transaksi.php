<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    public function nasabah()
    {
        return $this->belongsTo(nasabah::class, 'nasabah_id', 'id');
    }
}
