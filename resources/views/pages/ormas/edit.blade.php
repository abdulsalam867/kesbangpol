@extends('template_backend.index')
@section('title', 'Edit Data Organisasi Kemasyarakatan | Kesbangpol Lebak')
@section('sub-judul', 'Edit Data Ormas')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('ormas.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('ormas.update', $ormas->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<input name="no_surat" type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" placeholder="No Surat" value="{{$ormas->no_surat}}">
								@error('no_surat')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Ormas" value="{{$ormas->nama}}">
								@error('nama')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="alamat" class="text-muted">Alamat Ormas</label>
								<textarea id="content" name="alamat" class="form-control content @error('alamat') is-invalid @enderror">{!!$ormas->alamat!!}</textarea>
								@error('alamat')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<input name="telpon" type="number" class="form-control @error('telpon') is-invalid @enderror" id="telpon" placeholder="No Telpon" value="{{$ormas->telpon}}">
								@error('telpon')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
									<option value="" holder>Pilih Status</option>
									<option value="1" holder
									@if($ormas->status == 1)
									selected
									@endif>Terdaftar</option>
									<option value="2" holder
									@if($ormas->status == 2)
									selected
									@endif>Tidak Terdaftar</option>
									<option value="3" holder
									@if($ormas->status == 3)
									selected
									@endif>Tidak Disetujui</option>
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
								@if($ormas->file)
									<p class="text-danger" style="font-size: 10px;margin-bottom: 7px;">{{ $ormas->file }}</p>
								@endif
								@error('file')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror 
							</div>
							<div class="form-group mt-4">
								<button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-paper-plane"></i> Update Data</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection