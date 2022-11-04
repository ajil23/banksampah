<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable =[
        'namaLengkap',
        'tmp_lahir',
        'tgl_lahir',
        'alamat',
        'jenis_kelamin',
        'no_hp',
    ];
}
