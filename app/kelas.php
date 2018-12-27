<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';

    public function dosen(){
      return $this->belongsTo('App\dosen', 'dosen_id');
    }

    public function mahasiswa_kelas(){
      return $this->hasMany('App\mahasiswa_kelas', 'kelas_id');
    }

    public function jadwal(){
      return $this->hasMany('App\jadwal');
    }
}
