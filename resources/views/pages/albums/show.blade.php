@extends('template_backend.index')
@section('title', 'Lihat Album Photo | Kesbangpol Lebak')
@section('sub-judul', 'Lihat Album Photo')
@section('content')
<section class="conten">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('photo-create', $album->id) }}" class="btn bg-gradient-primary btn-xs">
					<i class="fas fa-plus"></i> Upload Photo
				</a>
				<a href="{{route('album.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				@if (count($album->photos) > 0)
				<div class="row">
					@foreach ($album->photos as $photo)
					<div class="col-md-2">
						<div class="card mb-4 box-shadow">
							<a href="{{asset('storage/albums/'.$photo->photo)}}" data-toggle="lightbox" data-gallery="mixedgallery" data-max-width="600" data-footer="">
								<img src="{{asset('storage/albums/'.$photo->photo)}}" class="img-thumbnail img-fluid" height="100px">
							</a>
							<div class="card-footer">
								<form action="{{route('photo-destroy', $photo->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-block bg-gradient-danger btn-xs">
										Hapus Photo
									</button>
								</form>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				@else
				<h3>No Photos yet.</h3>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection