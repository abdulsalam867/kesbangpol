@extends('template_backend.index')
@section('title', 'Edit Data Keputusan Bupati | Kesbangpol Lebak')
@section('sub-judul', 'Edit Data Kepbup')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="/kepbup" class="btn btn-success btn-xs float-right"><i class="fas fa-arrow-right"></i> Kembali</a>
			</div>
			<form action="{{route('kepbup.update', $kepbup->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nomor">Keputusan Bupati Nomor</label>
								<input name="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" id="nomor" value="{{$kepbup->nomor}}">
								@error('nomor')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tentang">Keputusan Bupati Tentang</label>
								<input name="tentang" type="text" class="form-control @error('tentang') is-invalid @enderror" id="tentang" value="{{$kepbup->tentang}}">
								@error('tentang')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Keputusan Bupati Tahun</label>
								<input type="text" name="tahun" class="yearpicker form-control custom-select" value="{{$kepbup->tahun}}"/>
							</div>
							<div class="form-group">
								<label for="file">File</label>
								<input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
								@if($kepbup->file)
									<p class="text-danger" style="font-size: 10px;margin-bottom: 7px;">{{ $kepbup->file }}</p>
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