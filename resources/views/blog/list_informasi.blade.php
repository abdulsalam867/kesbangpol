@extends('template_frontend.index')
@section('isi')

<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		@foreach($data as $list_informasi)
		<section class="course">
			<div class="preview">
				<img src="{{asset($list_informasi->gambar)}}" class="img-fluid">
			</div>
			<div class="info-card">
				<h6>{!!str_limit($list_informasi->title, 45, '....')!!}</h6>
				<h2>{{$list_informasi->users->name}}, <span> - {{$list_informasi->created_at->diffForHumans()}}</span>,
					@foreach($list_informasi->tags as $tag) 
					tags: {{ $tag->name }}
					@endforeach
				</h2>
				<p>
					{!!str_limit($list_informasi->content, 175, '....')!!} <a href="{{route('blog.isi-informasi', $list_informasi->slug)}}" style="font-style:italic;text-decoration: none;">Selengkapnya</a>
				</p>
			</div>
		</section>
		@endforeach
		<div class="col-lg-12 col-md-12">
			<span style="float: right;">{{$data->links()}}</span>
		</div>
		@endsection
		