@extends('template_backend.index')
@section('title', 'Edit Cover Album | Kesbangpol Lebak')
@section('sub-judul', 'Edit Cover Album')
@section('content')
<section class="content">
	<div class="containerf-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('album.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('album.update', $album->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="card-body mb-2">
					<div class="form-group">
						<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title Here" value="{{$album->title}}">
						@error('title')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Tempat dan Tanggal Here" value="{{$album->description}}">
						@error('description')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group clearfix">
						<div class="custom-file">
							<input type="file" accept="image/*" name="cover_image" class="custom-file-input @error('cover_image') is-invalid @enderror" id="file" style="cursor: pointer;" onchange="loadFile(event)">
							<label class="custom-file-label" for="file">Upload Image</label>
							@error('cover_image')
							<div class="invalid-feedback">{{$message}}</div>
							@enderror
						</div>
					</div>
					@if($album->cover_image)
					<img src="/storage/album_covers/{{ $album->cover_image }}" class="img-fluid" width="60" height="60">
					@endif

					<div class="form-group mt-3 clearfix">
						<button type="submit" class="btn bg-gradient-primary btn-xs"><i class="fas fa-paper-plane"></i> Update Album</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</section>
@endsection