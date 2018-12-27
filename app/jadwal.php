<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
      protected $table = 'jadwal';

      protected $primaryKey = 'id_jadwal';

      public function ruangan(){
        return $this->belongsTo('App\ruangan', 'ruangan_id');
      }

      public function kehadiran(){
        return $this->hasMany('App\kehadiran', 'jadwal_id');
      }

      public function kelas(){
        return $this->belongsTo('App\kelas', 'kelas_id');
      }


}
