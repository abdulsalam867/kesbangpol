@extends('template_backend.index')
@section('title', 'Tambah Data Peraturan Bupati | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Data Perbup')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="/perbup" class="btn btn-success btn-xs float-right"><i class="fas fa-arrow-right"></i> Kembali</a>
			</div>
			<form action="{{route('perbup.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nomor">Peraturan Bupati Nomor</label>
								<input name="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" id="nomor">
								@error('nomor')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tentang">Peraturan Bupati Tentang</label>
								<input name="tentang" type="text" class="form-control @error('tentang') is-invalid @enderror" id="tentang">
								@error('tentang')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Peraturan Bupati Tahun</label>
								<input type="text" name="tahun" class="yearpicker form-control custom-select"/>
							</div>
							<div class="form-group">
								<label for="file">File</label>
								<input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
								@error('file')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="form-group">
						<button type="submit" class="btn bg-gradient-primary btn-sm">Simpan Data</button>
						<button type="reset" class="btn bg-gradient-warning btn-sm">Reset</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection