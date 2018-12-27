<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kehadiran extends Model
{
    protected $table = 'kehadiran';

    protected $primaryKey ='id_kehadiran';

    public function jadwal(){
      return $this->belogsTo('App\jadwal','id_jadwal');
    }

    public function mahasiswa(){
      return $this->belongsTo('App\mahasiswa', 'mahasiswa_id');
    }
}
