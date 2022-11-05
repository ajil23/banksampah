<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nasabah extends Model
{
    use HasFactory;
    protected $table = 'nasabah';
    protected $primaryKey = 'id';

    public function penduduk(){
        return $this->belongsTo(Penduduk::class,'penduduk_id','id');
    }

    public function dawis(){
        return $this->hasOne(dawis::class,'nasabah_id');
    }

    public $timestamps = true;
}
