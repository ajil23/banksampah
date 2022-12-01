<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    protected $table = 'cash';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function nasabah()
    {
        return $this->belongsTo(nasabah::class, 'nasabah_id', 'id');
    }
}
