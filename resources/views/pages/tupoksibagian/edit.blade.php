@extends('template_backend.index')
@section('title', 'Edit Data Tupoksi Bagian | Kesbangpol Lebak')
@section('sub-judul', 'Edit Data Tupoksi Bagian')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('tupoksi.bagian')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('tupoksibagian.update', $bagian->id)}}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Tupoksi Bagian</label>
						<textarea id="content" name="content" class="form-control content @error('content') is-invalid @enderror">{!!$bagian->content!!}</textarea>
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