@extends('template_backend.index')
@section('title', 'Tambah Album Photo | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Album Photo')
@section('content')
<section class="conten">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('album.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body mb-2">
					<div class="form-group">
						<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title Here">
						@error('title')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Tempat dan Tanggal Here">
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
							<p><img id="cover_image" style="width: 100px;margin-top: 10px;"></p>
						</div>
					</div>
				</div>
				<br>
				<div class="card-footer mt-5">
					<button type="submit" class="btn bg-gradient-primary btn-xs">Upload Album</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection

<script>
	var loadFile = function(event) {
		var image = document.getElementById('cover_image');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>