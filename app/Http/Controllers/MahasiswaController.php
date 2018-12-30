<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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
        $validator = Validator::make($r->all(), [
            "nim" => "required",
            "nama" => "required",
            "rfid" => "required",
            "ortu_nama" => "required",
            "ortu_username" => "required",
            "ortu_password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "pesan" => $validator->errors()->first()
            ], 500);
        }
        $mahasiswa = mahasiswa::where("nim", $r->nim)
        ->orWhere("rfid", $r->rfid)
        ->first();
        if(!$mahasiswa){
            $ortu = new ortu;
            $ortu->nama = $r->ortu_nama;
            $ortu->username = $r->ortu_username;
            $ortu->password = bcrypt($r->ortu_password);
            $ortu->save();
            $mahasiswa = new mahasiswa;
            $mahasiswa->nama = $r->nama;
            $mahasiswa->nim = $r->nim;
            $mahasiswa->rfid = $r->rfid;
            $mahasiswa->ortu_id = $ortu->id_ortu;
            $mahasiswa->save();
            return response()->json([
                "pesan" => "Mahasiswa berhasil dimasukan"
            ]);
        } else {
            return response()->json([
                "pesan" => "Mahasiswa dengan NIM atau RFID tersebut sudah ada"
            ], 500);
        }
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
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($rfid)
    {
        $mahasiswa = mahasiswa::where("rfid", $rfid)->first();
 
        if($mahasiswa){
            return response()->json([
                "status" => true,
                "pesan" => "Mahasiswa dengan RFID ".$rfid." ditemukan",
                "mahasiswa" => $mahasiswa
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "pesan" => "Mahasiswa dengan RFID ".$rfid." tidak ditemukan",
                "mahasiswa" => null
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }
}
