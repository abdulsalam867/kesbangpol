@extends('template_backend.index')
@section('title', 'Tambah Data Parpol | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Data Parpol')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('parpol.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('parpol.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<input name="no_surat" type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" placeholder="No Surat">
								@error('no_surat')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Parpol">
								@error('nama')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="alamat" class="text-muted">Alamat Parpol</label>
								<textarea id="content" name="alamat" class="form-control content @error('alamat') is-invalid @enderror"></textarea>
								@error('alamat')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<input name="telpon" type="number" class="form-control @error('telpon') is-invalid @enderror" id="telpon" placeholder="No Telpon">
								@error('telpon')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
									<option value="" holder>Pilih Status</option>
									<option value="1" holder>Terdaftar</option>
									<option value="2" holder>Tidak Terdaftar</option>
									<option value="3" holder>Tidak Disetujui</option>
								</select>
								@error('status')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<div class="custom-file">
									<input type="file" name="file" class="custom-file-input text-truncate @error('file') is-invalid @enderror" id="customFile file">
									<label class="custom-file-label text-truncate @error('file') is-invalid @enderror" for="customFile" id="file">Choose file</label>
								</div>
								@error('file')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror 
							</div>
							<div class="form-group mt-4">
								<button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-paper-plane"></i> Simpan Data</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection