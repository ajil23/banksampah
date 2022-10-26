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
}
