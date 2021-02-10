@extends('template_backend.index')
@section('title', 'Edit Slide Image | Kesbangpol Lebak')
@section('sub-judul', 'Edit Slide Image')
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
				<form action="{{route('slideImages.update', $slide->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title here.." value="{{$slide->title}}">
						@error('title')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group clearfix">
						<div class="custom-file mb-2">
							<input type="file" accept="image/*" name="image" class="custom-file-input" id="file" style="cursor: pointer;" onchange="loadFile(event)">
							<label class="custom-file-label" for="file">Upload Image</label>
							<div class="row mt-3 mb-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="info">Gambar Baru</label>
										<p>
											<img id="output" style="width: 100px;">
										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="info">Gambar Lama</label>
										<p>
											@if($slide->image)
											<img src="{{asset($slide->image)}}" style="width:100px;" class="img-fluid">
											@endif
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<br>
					<br>
					<div class="form-group mt-5">
						<button class="btn bg-gradient-primary btn-xs"><i class="fas fa-paper-plane"></i> Update Data</button>
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