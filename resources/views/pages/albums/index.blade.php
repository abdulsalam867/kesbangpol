@extends('template_backend.index')
@section('title', 'Album Photo | Kesbangpol Lebak')
@section('sub-judul', 'Album Photo')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('album.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data</a>
				</div>
				<div class="card-body">
					<div class="album">
						<div class="row">
							@foreach($albums as $album => $gallery)
							<div class="col-md-3">
								<div class="card mb-4 box-shadow">
									<a href="/storage/album_covers/{{ $gallery->cover_image }}" data-toggle="lightbox" data-gallery="example-gallery" data-max-width="600">
										<img src="/storage/album_covers/{{ $gallery->cover_image }}" class="card-img-top img-fluid img-thumbnail" alt="Avatar" style="height: 170px;">
									</a>
									<div class="card-body">
										<span class="product-title" style="font-size: 14px;text-align: justify;">
											{!!str_limit($gallery->title, 30, '....')!!}</span>
											<span class="card-text" style="font-size: 12px;">{{$gallery->description}}</span>
										</div>
										<div class="card-footer">
											<div class="d-flex justify-content-between">
												<form action="{{route('album-destroy', $gallery->id) }}" method="POST" enctype="multipart/form-data">
													@csrf
													@method('delete')
													<div class="btn-group">
														<a href="{{ route('album-show', $gallery->id) }}" class="btn bg-gradient-primary btn-xs">View Album</a>
														<a href="{{ route('album.edit', $gallery->id) }}" class="btn bg-gradient-info btn-xs">Edit Album</a>
														<button type="submit" class="btn bg-gradient-danger btn-xs">Hapus</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		@endsection