<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ortu extends Model
{
    protected $table = 'ortu';

    protected $primaryKey = 'id_ortu';

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'nama', 'username', 'password',
    ];

    public function mahasiswa(){
      return $this->hasMany('App\mahasiswa');
    }

}
