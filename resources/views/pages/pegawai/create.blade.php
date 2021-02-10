@extends('template_backend.index')
@section('title', 'Pegawai | Kesbangpol Lebak')
@section('sub-judul', 'Pegawai')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('pegawai')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali</a>
				</div>
				<form action="{{route('pegawai.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama">Nama Pegawai</label>
									<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama">
									@error('nama')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="nip">NIP. Pegawai</label>
									<input name="nip" type="number" class="form-control @error('nip') is-invalid @enderror" id="nip">
									@error('nip')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="pangkat">Pangkat Pegawai</label>
									<input name="pangkat" type="text" class="form-control @error('pangkat') is-invalid @enderror" id="pangkat">
									@error('pangkat')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="golongan">Golongan Pegawai</label>
									<input name="golongan" type="text" class="form-control @error('golongan') is-invalid @enderror" id="golongan">
									@error('golongan')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="jabatan">Jabatan Pegawai</label>
									<input name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan">
									@error('jabatan')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="avatar">Foto Pegawai</label>
									<input type="file" accept="image/*" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar" onchange="loadFile(event)">
									<p><img id="output" style="width: 80px;height: 80px; margin-top: 10px;"></p>
									@error('avatar')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn bg-gradient-primary btn-xs">Simpan Data</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
	<script>
		var loadFile = function(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>