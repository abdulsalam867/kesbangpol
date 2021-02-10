@extends('template_frontend.index')
@section('isi')
@foreach($data as $isi_post)
<section class="post-block">
	<div class="blog-img">
		<img src="{{asset($isi_post->gambar)}}" class="img-fluid">
	</div>
</section>
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			{{$isi_post->title}}
		</div>
		<div class="meta-info mt-2">
			<div class="author-date">
				By. <span>{{$isi_post->users->name}}</span> - {{$isi_post->created_at->diffForHumans()}},
				Tags:  @foreach($isi_post->tags as $tag)
				<span>{{ $tag->name }}</span>
				@endforeach
			</div>
		</div>
		<div class="blog-content">
			<p>
				{!!$isi_post->content!!}
			</p>
		</div>
@endforeach
@endsection