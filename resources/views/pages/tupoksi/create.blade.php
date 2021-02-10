@extends('template_backend.index')
@section('title', 'Tambah Data Tupoksi | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Data Tupoksi')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('tupoksi.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('tupoksi.store')}}" method="POST">
					@csrf
					<div class="form-group">
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