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

    protected $fillable = [
        'idnasabah',
        'idriwayat',
        'idsampah',
        'berat',
        'harga_satuan',
        'sub_harga',
    ];
    public function sampah()
    {
        return $this->belongsTo(sampah::class, 'idsampah', 'id');
    }
   
}
