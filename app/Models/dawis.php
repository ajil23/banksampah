<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dawis extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'nasabah_id'
    ];

    public function nasabah(){
        return $this->belongsTo(nasabah::class,'nasabah_id','id');
    }
}
