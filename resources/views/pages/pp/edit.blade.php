@extends('template_backend.index')
@section('title', 'Edit Data Peraturan Pemerintah | Kesbangpol Lebak')
@section('sub-judul', 'Edit Data PP')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="/pp" class="btn btn-success btn-xs float-right"><i class="fas fa-arrow-right"></i> Kembali</a>
			</div>
			<form action="{{route('pp.update', $pp->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nomor">Undang-Undang Nomor</label>
								<input name="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" id="nomor" value="{{$pp->nomor}}">
								@error('nomor')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tentang">Undang-Undang Tentang</label>
								<input name="tentang" type="text" class="form-control @error('tentang') is-invalid @enderror" id="tentang" value="{{$pp->tentang}}">
								@error('tentang')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Undang-Undang Tahun</label>
								<input type="text" name="tahun" class="yearpicker form-control custom-select" value="{{$pp->tahun}}"/>
							</div>
							<div class="form-group">
								<label for="file">File</label>
								<input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
								@if($pp->file)
									<p class="text-danger" style="font-size: 10px;margin-bottom: 7px;">{{ $pp->file }}</p>
								@endif
								@error('file')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="form-group">
						<button type="submit" class="btn bg-gradient-primary btn-sm">Update Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection