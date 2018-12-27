<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwal;

class PageController extends Controller
{

    public $hari =  [
        1 => 'Senin',
        2 => 'Selasa',
        3 => 'Rabu',
        4 => 'Kamis',
        5 => 'Jumat',
        6 => 'Sabtu',
        7 => 'Minggu'
      ];

    public function index(){
        $hari = $this->hari;
        $data_jadwal = jadwal::with([
            "ruangan",
            "kelas" => function($q){
                $q->with(["dosen"])
                ->withCount("mahasiswa_kelas");
            },
        ])
        ->withCount("kehadiran")
        ->get();

        return view("dashboard.utama", compact("data_jadwal", "hari"));
    }

    public function kehadiran($id){
        $hari = $this->hari;
        $jadwal = jadwal::with([
            "ruangan",
            "kelas" => function($q){
                $q->with("dosen");
            }
        ])->findOrFail($id);

        return view("kehadiran", compact("jadwal", "hari"));
    }
}
