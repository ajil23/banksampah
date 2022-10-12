<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class sampah extends Model
{
    use HasFactory;
    protected $table = 'sampah';
    protected $primaryKey = 'id';
    public $timestamps = false;
}