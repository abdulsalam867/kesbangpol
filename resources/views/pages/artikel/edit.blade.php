@extends('template_backend.index')
@section('title', 'Edit Artikel | Kesbangpol Lebak')
@section('sub-judul', 'Edit Artikel')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('post.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<form action="{{route('post.update', $artikel->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title here.." value="{{$artikel->title}}">
								@error('title')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<textarea id="content" name="content" class="form-control content @error('content') is-invalid @enderror">{{$artikel->content}}</textarea>
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
									<option value="{{ $result->id }}"
										@if($result->id == $artikel->category_id)
										selected
										@endif>
										{{ $result->name }}
									</option>
									@endforeach
								</select>
								@error('category_id')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group">
								<select class="select2 @error('tags') is-invalid @enderror" name="tags[]" multiple="multiple" data-placeholder="Tags here.." id="tags" style="width: 100%;">
									@foreach($tags as $tag)
									<option value="{{ $tag->id }}"
										@foreach($artikel->tags as $value)
										@if($tag->id == $value->id)
										selected
										@endif
										@endforeach>
										{{ $tag->name }}
									</option>
									@endforeach
								</select>
								@error('tags')
								<div class="invalid-feedback">{{$message}}</div>
								@enderror
							</div>
							<div class="form-group clearfix">
								<div class="custom-file">
									<input type="file" accept="image/*" name="gambar" class="custom-file-input" id="file" style="cursor: pointer;" onchange="loadFile(event)">
									<label class="custom-file-label" for="file">Upload Image</label>
									<div class="row mt-3">
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
													@if($artikel->gambar)
													<img src="{{asset($artikel->gambar)}}" style="width:100px;" class="img-fluid">
													@endif
												</p>
											</div>
										</div>
									</div>
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