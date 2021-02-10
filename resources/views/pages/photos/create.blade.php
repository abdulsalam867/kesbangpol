@extends('template_backend.index')
@section('title', 'Upload Photo | Kesbangpol Lebak')
@section('sub-judul', 'Upload Photo')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<form action="{{route('Upload', $albumId) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="albums_id" value="{{$albumId}}">
				<div class="card-header">
					<a href="{{route('album.index')}}" class="btn bg-gradient-success btn-xs float-right">
						<i class="fas fa-arrow-right"></i> Kembali
					</a>
				</div>
				<div class="card-body">
					<div class="file-loading">
						<input id="input-b3" name="photo[]" type="file" class="file" multiple="true" data-show-upload="false" data-preview-file-type="any" data-upload-url="#" data-show-caption="true" data-theme="fas">
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn bg-gradient-primary btn-xs">Upload Photo</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection

<script>
	$("#input-b3").fileinput({
		theme: 'fas',
		uploadExtraData: function() {
			return {
				_token: $("input[name='_token']").val(),
			};
		},
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		overwriteInitial: false,
		maxFilesNum: 20,
		slugCallback: function (filename) {
			return filename.replace('(', '_').replace(']', '_');
		}
	});
</script>