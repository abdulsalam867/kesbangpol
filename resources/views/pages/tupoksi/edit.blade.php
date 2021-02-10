@extends('template_backend.index')
@section('title', 'Edit Data Tupoksi | Kesbangpol Lebak')
@section('sub-judul', 'Edit Data Tupoksi')
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
				<form action="{{route('tupoksi.update', $tupoksi->id)}}" method="POST">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<label>Visi :</label>
						<textarea id="content" name="content" class="form-control content @error('content') is-invalid @enderror">{!!$tupoksi->content!!}</textarea>
						@error('content')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-gradient-primary btn-xs">Update Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection