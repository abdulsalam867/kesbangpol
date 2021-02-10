@extends('template_backend.index')
@section('title', 'Lihat Pengaduan | Kesbangpol Lebak')
@section('sub-judul', 'Lihat Pengaduan')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card card-widget">
			<div class="card-header">
				<div class="user-block">
					<img class="img-circle" src="{{asset('images/user.png')}}" alt="Avatar">
					<span class="username text-muted">{{$pengaduan->title}}</span>
					<span class="description">Pengirim - {{$pengaduan->email}}</span>
				</div>
				<div class="card-tools">
					<a href="{{route('pengaduan.index')}}" class="btn bg-gradient-success btn-xs float-right">
						<i class="fas fa-arrow-right"></i> Kembali
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="mailbox-read-message">
					{!!$pengaduan->content!!}
				</div>
			</div>
			<div class="card-footer">
				<div class="mailbox-attachment-info">
					<span class="mailbox-attachment-size clearfix">File :</span>
					<a href="{{route('download.pengaduan',$pengaduan->id)}}" class="mailbox-attachment-name text-truncate" target="_blank"><i class="fas fa-paperclip"></i> {!!str_limit($pengaduan->file, 10, '....')!!}</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection