@extends('template_backend.index')
@section('title', 'Dashboard Kesbangpol Lebak')
@section('sub-judul', 'Dashboard')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{totalPosts()}}</h3>
            <p>Artikel</p>
          </div>
          <div class="icon">
            <i class="fas fa-book-open"></i>
          </div>
          <a href="/artikel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{totalInformasi()}}</h3>
            <p>Informasi</p>
          </div>
          <div class="icon">
            <i class="fas fa-bullhorn"></i>
          </div>
          <a href="/informasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>{{totalPengaduan()}}</h3>
            <p>Pengaduan</p>
          </div>
          <div class="icon">
            <i class="fas fa-headset"></i>
          </div>
          <a href="/pengaduan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{totalPegawai()}}</h3>
            <p>Pegawai</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="/pegawai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-muted">Artikel Terbaru</h3>
          </div>
          <div class="card-body">
            <table id="tabel_umum" class="display" width="100%">
              <thead>
                <tr style="text-align: center;">
                  <th>No.</th>
                  <th>Kontent</th>
                  <th>Penulis</th>
                </tr>
              </thead>
              <tbody>
                @foreach($articles as $result => $hasil)
                <tr style="text-align: center;">
                  <td>{{$loop->iteration}}</td>
                  <td style="text-align: justify;">
                    <a href="{{route('post.show', $hasil->id)}}" style="color: #000000;">
                      {!!str_limit($hasil->title, 60, '....')!!}
                    </a>
                  </td>
                  <td>{{$hasil->users->name}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-muted">Pegawai Kesbangpol</h3>
          </div>
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
              @foreach($staff as $result => $data)
              <li class="item">
                <div class="product-img">
                  <img src="{{$data->avatar}}" alt="Avatar" class="img-size-50">
                </div>
                <div class="product-info">
                  <span class="product-title">{{$data->nama}}</span>
                  <span class="product-description">
                    {{$data->jabatan}}
                  </span>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="card-footer text-center">
            <a href="/pegawai" class="uppercase">Lihat Semua Pegawai</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection