@extends('template_backend.index')
@section('title', 'Tambah Category | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Category')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('category.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('category.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Kategori disini">
						@error('name')
							<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-gradient-info btn-xs">Simpan Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection