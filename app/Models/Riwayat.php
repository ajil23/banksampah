<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $primaryKey = 'kode_id';

    public function nasabah()
    {
        return $this->belongsTo(nasabah::class, 'nasabah_id', 'id');
    }
    public function detail()
    {
        return $this->hasMany(detailMasukan::class,'idriwayat','kode_id');
    }
    public function petugas()
    {
        return $this->belongsTo(petugas::class, 'petugas_id', 'id');
    }
    public function dawis()
    {
        return $this->belongsTo(dawis::class, 'dawis_id', 'id');
    }
}
