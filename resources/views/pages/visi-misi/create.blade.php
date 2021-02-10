@extends('template_backend.index')
@section('title', 'Tambah Data Visi Misi | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Data Visi Misi')
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
				<form action="{{route('visimisi.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<label>Visi :</label>
						<textarea id="content" name="visi" class="form-control content @error('visi') is-invalid @enderror"></textarea>
						@error('visi')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Misi :</label>
						<textarea id="content2" name="misi" class="form-control content @error('misi') is-invalid @enderror"></textarea>
						@error('misi')
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