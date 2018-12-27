<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $table = 'ruangan';

    protected $primaryKey = 'id_ruangan';

    public function jadwal(){
      return $this->hasMany('App\jadwal');
    }
}
