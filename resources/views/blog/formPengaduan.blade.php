@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Form Pengaduan</h4>
			<hr>
		</div>
		<div class="post-body mt-4">
			<form action="{{route('blog.postPengaduan')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Judul Pengaduan">
				@error('title')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Pengirim">
				@error('email')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group">
				<textarea id="content" name="content" class="form-control content @error('content') is-invalid @enderror"></textarea>
				@error('content')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group">
				<div class="custom-file">
					<input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="customFile">
					<label class="custom-file-label text-truncate @error('file') is-invalid @enderror" for="customFile">Choose file</label>
				</div>
				@error('file')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Upload Data</button>
			</div>
		</form>
		</div>
		@endsection

		
		