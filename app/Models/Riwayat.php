<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $primaryKey = 'kode_id';

    public function nasabah()
    {
        return $this->belongsTo(nasabah::class, 'nasabah_id', 'id');
    }
}
