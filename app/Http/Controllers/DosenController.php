<?php

namespace App\Http\Controllers;

use App\dosen;
use Illuminate\Http\Request;
use App\kelas;
use App\ruangan;
use App\jadwal;
use Hash;
use Carbon\Carbon;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public $hari =  [
        1 => 'Senin',
        2 => 'Selasa',
        3 => 'Rabu',
        4 => 'Kamis',
        5 => 'Jumat',
        6 => 'Sabtu',
        7 => 'Minggu'
      ];

    public function login(Request $request){

        $usr = $request->username;
        $pass = $request->password;
        $dosen = dosen::where('username', $usr)
          ->selectRaw('id_dosen, nama, rfid, username, password, token')
          ->first();

        $hari = $this->hari;
        $dosen_jadwal = dosen::where('username', $usr)
                      ->join('kelas', 'dosen.id_dosen', '=', 'kelas.dosen_id')
                      ->join('jadwal', 'kelas.id_kelas', '=', 'jadwal.kelas_id')
                      ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id_ruangan')
                      ->select('jadwal.id_jadwal',
                                'dosen.nama as nama_dosen',
                                'ruangan.nama as nama_ruangan',
                                'jadwal.hari',
                                'kelas.nama as nama_kelas',
                                'jadwal.mulai',
                                'jadwal.selesai')
                      ->get();

        // return $dosen_jadwal;

        if (Hash::check($pass, $dosen->password)) {
          if ($dosen->token == null) {
            $dosen->token = uniqid();
            $dosen->save();
          }
          return view('jadwal_dosen', compact('dosen', 'dosen_jadwal', 'hari'));
           //  return response()->json([
           //    'status'  => true,
           //    'message' => 'User terotentifikasi',
           //    'ortu'  => $dosen,
           //    'jadwal'=>$dosen_jadwal
           // ]);
        }

        return response()->json([
          'status'  => false,
          'msg'     => 'Salah kombinasi password dan username'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(dosen $dosen)
    {
        //
    }
}
