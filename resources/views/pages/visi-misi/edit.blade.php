@extends('template_backend.index')
@section('title', 'Edit Data Visi Misi | Kesbangpol Lebak')
@section('sub-judul', 'Edit Data Visi Misi')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('visimisi.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('visimisi.update', $visimisi->id)}}" method="POST">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<label>Visi :</label>
						<textarea id="content" name="visi" class="form-control content @error('visi') is-invalid @enderror">{!!$visimisi->visi!!}</textarea>
						@error('visi')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Misi :</label>
						<textarea id="content2" name="misi" class="form-control content @error('misi') is-invalid @enderror">{!!$visimisi->misi!!}</textarea>
						@error('misi')
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