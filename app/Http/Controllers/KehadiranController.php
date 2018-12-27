<?php

namespace App\Http\Controllers;

use App\kehadiran;
use Illuminate\Http\Request;
use Validator;
use App\mahasiswa;
use App\jadwal;
use Carbon\Carbon;

class KehadiranController extends Controller
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
            "rfid" => "required|string",
            "ruangan_id" => "required|int"
        ], [
            "rfid.required" => "RF ID tidak boleh kosong",
            "ruangan_id.required" => "Ruangan ID tidak boleh kosong"
		]);

        if ($validator->fails()) {
            return response()->json([
            	"status" => false,
            	"pesan" => $validator->errors()->first()
            ], 500);
        }

        $mahasiswa = mahasiswa::with([
            "mahasiswa_kelas"
        ])
        ->where('rfid', $request->rfid)
        ->first();

        // return response()->json([
        //     'status' => false,
        //     'resp'  => $mahasiswa
        // ]);

        $daftar_jadwal = jadwal::where([
            "hari" => idate("w", time()),
            "ruangan_id"    => $request->ruangan_id
        ])
        ->where('mulai', '<=', date('H:i:s'))
        ->where('selesai', '>=', date('H:i:s'))
        ->get();

        $sudah_absen = false;
        $kehadiran = null;

        foreach($daftar_jadwal as $jadwal){
            foreach($mahasiswa->mahasiswa_kelas as $mahasiswa_kelas){
                //jika mahasiswa mempunyai kelas
                if($mahasiswa_kelas->kelas_id == $jadwal->kelas_id){
                    //mengecek kehadiran mahasiswa
                    $jml_kehadiran = kehadiran::where([
                        "mahasiswa_id" => $mahasiswa->id_mhs,
                        "jadwal_id" => $jadwal->id_jadwal,
                        "status_valid" => 0
                    ])
                    ->whereDate("created_at", "=", date('Y-m-d'))
                    ->count();
                    if($jml_kehadiran == 0){
                        $kehadiran = new kehadiran;
                        $kehadiran->mahasiswa_id = $mahasiswa->id_mhs;
                        $kehadiran->jadwal_id = $jadwal->id_jadwal;
                        $kehadiran->created_at = date('Y-m-d H:i:s');
                        $kehadiran->updated_at = date('Y-m-d H:i:s');
                        $kehadiran->status_valid = 0;
                        $kehadiran->save();
                        $sudah_absen = true;
                        break;
                    }
                }
            }
            if($sudah_absen){
                break;
            }
        }

        if($sudah_absen){
            return response()->json([
                "status" => true,
                "pesan" => "Absen berhasil",
                "kehadiran" => $kehadiran
            ]);
        } else {
            return response()->json([
                "status" => false,
                "pesan" => "Tidak terdapat kelas",
                "kehadiran" => $kehadiran
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return kehadiran::with("mahasiswa")
            ->whereDate("created_at", "=",date('Y-m-d'))
            ->where('jadwal_id', $id)
            ->orderBy("created_at", "desc")
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kehadiran $kehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(kehadiran $kehadiran)
    {
        //
    }
}
