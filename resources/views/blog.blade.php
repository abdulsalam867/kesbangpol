@extends('template_frontend.index')
@section('title', 'Badan Kesatuan Bangsa dan Politik Kabupaten Lebak')
@section('isi')
<section class="slider">
	<div class="row d-flex justify-content-between mt-2">
		<div class="col-md-12 slider-image">
			<div class="post">
				<div class="featured-img img-fluid img-thumbnail">
					<div class="owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
							<div class="owl-stage">
								@foreach($slideImage as $imageSlide)
								<div class="owl-item b-news-item slider">
									<img src="{{asset($imageSlide->image)}}" width="100%" height="420">
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="row mt-4">
	<div class="col-lg-8 col-md-12">
		<div class="block-container">
			<h3 class="block-title">
				<span>Artikel Terbaru</span>
			</h3>
			<div class="row mt-3">
				@foreach($data as $post_terbaru)
				<div class="col-lg-6 col-md-6">
					<div class="post-block">
						<div class="post-img">
							<img src="{{$post_terbaru->gambar}}" class="img-fluid" alt="">
						</div>
						<h4>
							<a href="{{route('blog.isi', $post_terbaru->slug)}}">
								{!!str_limit($post_terbaru->title, 37, '....')!!}
							</a>
						</h4>
						<div class="meta-info">
							<div class="author-date">
								<i class="fas fa-user-circle"></i> <span>{{$post_terbaru->users->name}}</span>
								- {{$post_terbaru->created_at->diffForHumans()}}, 
								- @foreach($post_terbaru->tags as $tag) 
								<i class="fas fa-tags"></i> {{ $tag->name }}
								@endforeach
							</div>
						</div>
						<p>
							{!!str_limit($post_terbaru->content, 175, '....')!!}
						</p>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 col-md-12">
				<span style="float: right;">{{$data->links()}}</span>
			</div>
		</div>

		<div class="block-container clearfix mt-5">
			<h3 class="block-title">
				<span>Kata-Kata Bijak</span>
			</h3>
			<div class="col-lg-12 col-md-12">
				<div class="owl-carousel owl-theme owl-loaded bijak">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							@foreach($quotes_widget as $quotes)
							<div class="owl-item">
								<blockquote>
									<p class="lead">{!!$quotes->content!!}</p>
									<small class="sub-lead">- {{$quotes->author}}</small>
								</blockquote>
							</div>
							@endforeach
						</div>
					</div>
					<div class="owl-nav mt-4">
						<div class="owl-prev"><i class="fas fa-angle-left"></i></div>
						<div class="owl-next"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>
			</div>
		</div>
		@endsection

