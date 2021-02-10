@extends('template_backend.index')
@section('title', 'Tambah Data Surat Rekomendasi Penelitian | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Data Penelitian')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('penelitian.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('penelitian.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title here">
						@error('title')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Content :</label>
						<textarea id="content" name="content" class="form-control content @error('content') is-invalid @enderror"></textarea>
						@error('content')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-gradient-primary btn-xs">Simpan Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection