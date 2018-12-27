<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id_mhs';

    public function mahasiswa_kelas(){
      return $this->hasMany('App\mahasiswa_kelas', 'mahasiswa_id');
    }

    public function kehadiran(){
      return $this->hasMany('App\kehadiran', "mahasiswa_id");
    }

    public function ortu(){
      return $this->belongsTo('App\ortu', 'ortu_id', 'id_ortu');
    }
}
