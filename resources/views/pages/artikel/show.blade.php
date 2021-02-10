@extends('template_backend.index')
@section('title', 'Show Artikel | Kesbangpol Lebak')
@section('sub-judul', 'Show Artikel')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card card-widget">
			<div class="card-header">
				<div class="user-block">
					<img class="img-circle" src="{{asset('images/user.png')}}" alt="Avatar">
					<span class="username text-muted">{{$artikel->title}}</span>
					<span class="description">Shared publicly - {{$artikel->users->name}}</span>
				</div>
				<div class="card-tools">
					<a href="{{route('dashboard')}}" class="btn bg-gradient-success btn-xs float-right">
						<i class="fas fa-arrow-right"></i> Kembali
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="mailbox-read-message">
					{!!$artikel->content!!}
				</div>
			</div>
			<div class="card-footer">
				<ul class="mailbox-attachments d-flex align-items-stretch clearfix">
					<li>
						<span class="mailbox-attachment-icon has-img">
							<a href="{{asset($artikel->gambar)}}" data-toggle="lightbox" data-gallery="example-gallery" data-max-width="600">
								<img src="{{asset($artikel->gambar)}}" class="img-fluid img-thumbnail" alt="images" width="100%">
							</a>
						</span> 
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection