<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Badan Kesatuan Bangsa dan Politik Kabupaten Lebak">
	<meta content="Kesbangpol Lebak, kesbangpol_lebak, kesbangpol kabupaten lebak, kesbangpollebak" 
	name="keywords" />
	<meta name="author" content="Abdul Salam">
	<link rel="icon" href="{{ asset('/images/favicon.png') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{asset('lib/styles.css')}}">
	<link rel="stylesheet" href="{{asset('vendor/lte/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('lib/css/jquery.dataTables.min.css')}}">
  	<link rel="stylesheet" href="{{asset('lib/css/responsive.dataTables.min.css')}}">
  	<link rel="stylesheet" href="{{asset('vendor/lte/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  	<link rel="stylesheet" href="{{asset('vendor/lte/plugins/toastr/toastr.min.css')}}">
	<style>
		.ck-editor__editable_inline {
			min-height: 200px;
		}

		.ck-editor__editable {
			max-height: 200px;
		}

		.file-input {
			width: 100%;
		}

	</style>

</head>
<body>
	<div class="wrapper">
		@include('sweetalert::alert')
		<header>
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9 d-flex breaking-news-bar">
							<div class="breaking-title"><h6>Informasi:</h6></div>
							<div class="owl-carousel owl-theme owl-loaded breaking">
								<div class="owl-stage-outer">
									<div class="owl-stage">
										@foreach($widget_informasi as $informasi => $data)
										<div class="owl-item b-news-item">
											{{$data->title}}
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-lg-3 top-bar-social text-md-right text-lg-right">
							<ul>
								<li><a href=""><i class="fab fa-facebook"></i></a></li>
								<li><a href=""><i class="fab fa-twitter"></i></a></li>
								<li><a href=""><i class="fab fa-instagram"></i></a></li>
								<li><a href=""><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- end top bar-->
			<div class="header-content">
				<div class="container">
					<div class="row">
						<div class="col-md-8 logo">
							<img src="{{asset('/images/logoweb.png')}}" class="img-fluid" alt="logo">
						</div>
						<div class="col-md-4">
							<form role="form" action="{{route('blog.cari')}}" method="get">
								<div class="input-group searc-form">
									<input id="kata_kunci" name="cari" type="text" class="typeahead form-control" placeholder="Cari Artikel...">
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end header content-->
			<div class="main-navigation">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<div class="container">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="{{url('')}}">Home</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Profil
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{route('blog.pegawai')}}">Struktur Organisasi</a>
										<a class="dropdown-item" href="{{route('blog.visimisi')}}">Visi Misi</a>
										<a class="dropdown-item" href="{{route('blog.tupoksi')}}">Tupoksi Kesbang</a>
										<a class="dropdown-item" href="{{route('blog.tupoksibagian')}}">Tupoksi Bagian</a>
										<a class="dropdown-item" href="{{route('blog.renstra')}}">Renstra</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Produk Hukum
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{route('blog.uud')}}">Undang-Undang</a>
										<a class="dropdown-item" href="{{route('blog.pp')}}">Peraturan Pemerintah</a>
										<a class="dropdown-item" href="{{route('blog.perda')}}">Peraturan Daerah</a>
										<a class="dropdown-item" href="{{route('blog.perbup')}}">Peraturan Bupati</a>
										<a class="dropdown-item" href="{{route('blog.kepbup')}}">Keputusan Bupati</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Pelayanan
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{route('blog.penelitian')}}">Rekomendasi Penelitian</a>
										<a class="dropdown-item" href="{{route('blog.ormas')}}">
										Keterangan Tercatat (Ormas)</a>
										<a class="dropdown-item" href="{{route('blog.parpol')}}">Keterangan Terdaftar (Parpol)</a>
										<a class="dropdown-item" href="{{route('blog.keterangan')}}">Keterangan Tak Pernah Khianat</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('blog.list')}}">Artikel</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('blog.informasi')}}">Informasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('blog.formPengaduan')}}">Pengaduan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('blog.album')}}">Galeri</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('blog.library')}}">Perpustakaan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/login">Login</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<!-- end main navigation-->
		</header>