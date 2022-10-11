<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dawis extends Model
{
    use HasFactory;
    protected $table = 'dawis';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
