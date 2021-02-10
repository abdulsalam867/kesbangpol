@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Album Galleri Badan Kesbangpol Lebak</h4>
			<hr>
		</div>
		<div class="post-body">
			<div class="album">
				<div class="row">
					@foreach($data as $gallery)
					<div class="col-md-4">
						<div class="card mb-4 box-shadow">
							<a href="{{route('blog.photo', $gallery->id)}}">
								<img src="/storage/album_covers/{{ $gallery->cover_image }}" class="card-img-top img-fluid img-thumbnail" alt="Avatar" height="150">
							</a>
							<p class="p-1">{!!str_limit($gallery->title, 25, '....')!!}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

		@endsection


