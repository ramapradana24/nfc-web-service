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

  <main id="main">
    <section id="portfolio">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Jadwal Mata Kuliah</h3>
            <p class="section-description dosen"> <span class="fa fa-user-circle-o"></span> {{$dosen->nama}}</p>
          </div>
          <div class="row" id="portfolio-wrapper">
            @if(count($dosen_jadwal))
              @foreach($dosen_jadwal as $j_dosen)
                <div class="col-md-3 col-sm-12 jadwal">
                  <a href="{{action('JadwalController@edit', $j_dosen->id_jadwal)}}">
                    <div class="img-jadwal"></div>
                    <div class="detail">
                      <h5>{{ $j_dosen->nama_kelas }}</h5>
                      <p class="ruangan">{{ $j_dosen->nama_ruangan }}</p>
                      <span class="waktu">{{ $hari[$j_dosen->hari] }}, {{$j_dosen->mulai}} - {{ $j_dosen->selesai }}</span>
                    </div>
                  </a>
                </div>
              @endforeach
            @endif
          </div>
        </div>
    </section>
  </main>
      <!-- <div class="row">
        <div class="col-lg-12 text-center mt-10 mt-10">
          <h3>Jadwal {{$dosen->nama}}</h3>
        </div>
      </div> -->



      <!-- <div class="row">
        @foreach($dosen_jadwal as $j_dosen)
        <div class="col-lg-3 col-md-6 mt-20">
          <a href="{{action('JadwalController@edit', $j_dosen->id_jadwal)}}">
            <div class="card-tb">
            <div class="card-body">
                <h4>{{$j_dosen->nama_kelas}}</h4>
                <span>{{$j_dosen->nama_ruangan}}</span> <br>
                <span>{{$hari [$j_dosen->hari]}}</span>
                <p>{{$j_dosen->mulai}} sampai {{$j_dosen->selesai}}</p>
            </div>
            </div>
          </a>
        </div>
        @endforeach
      </div> -->
@endsection
