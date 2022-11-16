<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sampah extends Model
{
    use HasFactory;
    protected $table = 'sampah';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function harga()
    {
        return DB::table('sampah')->get();
    }
}