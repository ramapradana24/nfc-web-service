<?php

namespace App\Http\Controllers;

use App\ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;

class OrtuController extends Controller
{
  public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(Request $request){
        $usr = $request->username;
        $pass = $request->password;
        $ortu = ortu::where('username', $usr)
          ->selectRaw('id_ortu, nama, username, password, token')
          ->first();


        if (Hash::check($pass, $ortu->password)) {
          if ($ortu->token == null) {
            $ortu->token = uniqid();
          }
          $ortu->fcm = $request->fcm;
          $ortu->save();

          return response()->json([
            'status'  => true,
            'message' => 'User terotentifikasi',
            'ortu'  => $ortu
          ]);
        }

        return response()->json([
          'status'  => false,
          'msg'     => 'Salah kombinasi password dan username'
        ]);
    }

    public function riwayatMahasiswa($id_ortu){
      $riwayat = ortu::where('ortu.token', $id_ortu)
        ->join('mahasiswa', 'mahasiswa.ortu_id', '=', 'ortu.id_ortu')
        ->join('kehadiran', 'kehadiran.mahasiswa_id', '=', 'mahasiswa.id_mhs')
        ->join('jadwal', 'jadwal.id_jadwal', '=', 'kehadiran.jadwal_id')
        ->join('kelas', 'kelas.id_kelas', '=', 'jadwal.kelas_id')
        ->join('dosen', 'dosen.id_dosen', '=', 'kelas.dosen_id')
        ->select('ortu.id_ortu',
                  'mahasiswa.nama as nama_mahasiswa',
                  'kelas.nama as nama_kelas',
                  'kehadiran.created_at as waktu_absensi',
                  'kehadiran.status_valid as status',
                  'kehadiran.tgl_valid',
                  'jadwal.mulai', 'jadwal.selesai', 'dosen.nama as nama_dosen')
        ->whereNotNull('kehadiran.tgl_valid')
        ->orderBy('kehadiran.created_at', 'desc')
        ->get();

      return response()->json([
        'status'  => true,
        'msg'     => 'berhasil',
        'riwayat' => $riwayat
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
      $validator = Validator::make($request->all(), [
              'nama' => 'required',
              'ortu' => 'required|unique:ortu',
              'password' => 'required'
          ]);

      if ($validator->fails()) {
              return response()->json(['error'=>$validator->errors()], 401);
        }
      $input = $request->all();
      $userOrtu = ortu::create($input);

      return response()->json([$userOrtu]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function show(ortu $ortu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function edit(ortu $ortu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ortu $ortu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function destroy(ortu $ortu)
    {
        //
    }
}
