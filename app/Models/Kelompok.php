<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;
    protected $table = 'kelompok';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function nasabah()
    {
        return $this->belongsTo(nasabah::class, 'idnasabah', 'id');
    }
    public function dawis()
    {
        return $this->belongsTo(dawis::class, 'iddawis', 'id');
    }
}
