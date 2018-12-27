<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table='dosen';

    protected $primaryKey='id_dosen';

    public function kelas(){
      return $this->hasMany('App\kelas');
    }
    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'nama', 'rfid', 'username', 'password',
    ];
}
