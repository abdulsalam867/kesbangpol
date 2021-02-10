@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		@foreach($album_widget as $album)
		<div class="post-title">
			<h4>Nama Album : {{$album->title}}</h4>
			<p>Lokasi : {{$album->description}}</p>
			<hr>
		</div>
		@endforeach
		<div class="post-body">
			<div class="album">
				<div class="row">
					@foreach($data as $photo)
					<div class="col-md-4 mt-2">
						<div class="card mb-4 box-shadow">
							<a href="{{asset('storage/albums/'.$photo->photo)}}" data-toggle="lightbox" data-gallery="example-gallery" data-max-width="600">
								<img src="{{asset('storage/albums/'.$photo->photo)}}" class="card-img-top img-fluid img-thumbnail" alt="Avatar" height="150">
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

		@endsection


