@extends('template_backend.index')
@section('title', 'Tambah Informasi | Kesbangpol Lebak')
@section('sub-judul', 'Tambah Informasi')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('informasi.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<form action="{{route('informasi.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title here..">
								@error('title')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<textarea id="content" name="content" class="form-control content @error('content') is-invalid @enderror"></textarea>
								@error('content')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<select class="form-control custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
									<option value="" holder>Category here..</option>
									@foreach($category as $result)
									<option value="{{ $result->id }}">{{ $result->name }}</option>
									@endforeach
								</select>
								@error('category_id')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<select class="select2 @error('tags') is-invalid @enderror" name="tags[]" multiple="multiple" data-placeholder="Tags here.." id="tags" style="width: 100%;">
									@foreach($tags as $tag)
									<option value="{{ $tag->id }}">{{ $tag->name }}</option>
									@endforeach
								</select>
								@error('tags')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group clearfix">
								<div class="custom-file">
									<input type="file" accept="image/*" name="gambar" class="custom-file-input @error('gambar') is-invalid @enderror" id="file" style="cursor: pointer;" onchange="loadFile(event)">
									<label class="custom-file-label" for="file">Upload Image</label>
									@error('gambar')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
									<p><img id="output" style="width: 100px;margin-top: 10px;"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="form-group">
						<button class="btn bg-gradient-primary btn-sm"><i class="fas fa-paper-plane"></i> Simpan Data</button>
					</div>
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