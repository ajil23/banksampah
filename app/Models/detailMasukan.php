<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailMasukan extends Model
{
    use HasFactory;
    protected $table = 'detail_masukan';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function sampah()
    {
        return $this->belongsTo(sampah::class, 'idsampah', 'id');
    }
    public function petugas()
    {
        return $this->belongsTo(petugas::class, 'idpetugas', 'id');
    }
    public function dawis()
    {
        return $this->belongsTo(dawis::class, 'iddawis', 'id');
    }
}
