@extends('template_backend.index')
@section('title', 'Tambah Slide Image | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Slide Image')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('slideImages.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('slideImages.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title here..">
						@error('title')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group clearfix">
						<div class="custom-file mb-3">
							<input type="file" accept="image/*" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="file" style="cursor: pointer;" onchange="loadFile(event)">
							<label class="custom-file-label" for="file">Upload Image</label>
							@error('image')
							<div class="invalid-feedback">{{$message}}</div>
							@enderror
							<p><img id="output" style="width: 100px;margin-top: 10px;"></p>
						</div>
					</div>
					<br>
					<div class="form-group mt-5">
						<button class="btn bg-gradient-primary btn-xs"><i class="fas fa-paper-plane"></i> Simpan Data</button>
					</div>
				</form>
			</div>
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