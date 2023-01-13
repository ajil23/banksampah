<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class nasabah extends Model
{
    use HasFactory;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'nasabah';
    protected $primaryKey = 'id';

    public function penduduk(){
        return $this->belongsTo(Penduduk::class,'penduduk_id','id');
    }

    public function kelompok()
    {
        return $this->hasOne(Kelompok::class, 'idnasabah');
    }
   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function dawis()
    {
        return $this->hasOne(dawis::class, 'nasabah_id');
    }
    public $timestamps = true;
}
