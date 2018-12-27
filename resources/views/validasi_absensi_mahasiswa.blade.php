@extends('layouts.temp')

@section('title')
  Jadwal DOSEN
@endsection


@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">NFC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

            </ul>
        </div>
    </div>
</nav>


  <div class="container">
    <div class="card-tb">
      <h3 class="text-center">{{$det_jadwal->nama_kelas}}</h3>
      <p class="text-center text-muted"> <span class="fa fa-user-circle mr-1"></span>{{$det_jadwal->nama_dosen}}</p>
      <h6 class="text-center"><span class="ruangan">{{$det_jadwal->nama_ruangan}}</span>{{$hari [$det_jadwal->hari]}}, {{$det_jadwal->mulai}}-{{$det_jadwal->selesai}}</h6>
      <div class="right">
          <select class="" name="myselect" id="exampleFormControlSelect1" onchange="location=this.value">
            @if(isset($pertemuanKe))
              <option value="{{route('jadwal.edit', ['id_jadwal'=>$det_jadwal->id_jadwal])}}">Hari Ini</option>
              @foreach($tgl_jadwal as $tanggal)
               <option value="{{route('jadwal.edit', ['id_jadwal'=>$det_jadwal->id_jadwal])}}?pertemuanKe={{ date('Y-m-d', strtotime($tanggal->tanggal))}}" {{ ($pertemuanKe == date('Y-m-d', strtotime($tanggal->tanggal))) ? "selected=''" : ""}}>{{ date('d-m-Y', strtotime($tanggal->tanggal))}}</option>
              @endforeach
            @else
              <option>Hari Ini</option>
              @foreach($tgl_jadwal as $tanggal)
              <option value="{{route('jadwal.edit', ['id_jadwal'=>$det_jadwal->id_jadwal])}}?pertemuanKe={{ date('Y-m-d', strtotime($tanggal->tanggal))}}">{{ date('d-m-Y', strtotime($tanggal->tanggal))}}</option>
              @endforeach
            @endif
          </select>
      </div>
      <div class="right">
        <h6 class="">Pertemuan Ke - </h6>
      </div>
      <div class="table-responsive">

        <form action="{{ route('jadwal.validateClass') }}" method="post">
          <input type="hidden" name="id_jadwal" value="{{ $det_jadwal->id_jadwal }}">
        <table class="table table-bordered table-stripped">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Waktu Absensi</th>
              <th>Status</th>
              @if ($validJadwal->count() == 0)
                <th style="text-align:center">
                  <input type="checkbox" name="" id="check-all">
                </th>
              @endif
            </tr>
          </thead>
          <tbody>
              @csrf
              @foreach($jadwal_dosen as $j_dsn)
                <tr>
                  <td>{{$j_dsn->nim_mahasiswa}}</td>
                  <td>{{$j_dsn->nama_mahasiswa}}</td>
                  <td>{{ date('H:i d/m/Y', strtotime($j_dsn->waktu_absensi)) }}</td>
                  <td>{{ ($j_dsn->status == 1)? "Valid" : "Tidak Valid" }}</td>
                  @if ($validJadwal->count() == 0)
                    <td style="text-align:center">
                      <input type="checkbox" name="valid[]" value="{{ $j_dsn->id_mhs }}">
                    </td>
                  @endif
                </tr>
              @endforeach>
          </tbody>
        </table>
        @if ($validJadwal->count() == 0)
          <button class="btn btn-success pull-right">Valid Kehadiran Mahasiswa</button>
        @endif

        </form>
      </div>
    </div>
  </div>

@endsection
