</div>
<div class="col-lg-4 col-md-12">
	<div class="sidebar">
		<div class="widget">
			<h3 class="widget-title">Latest News</h3>
			<div class="widget-content">
				<ul class="latest-news">
					@foreach($widget_informasi as $informasi)
					<li>
						<div class="latest-news-item clearfix">
							<div class="item-thumbnail">
								<a href="{{route('blog.isi-informasi', $informasi->slug)}}">
									<img src="{{asset($informasi->gambar)}}" class="img-fluid" alt="">
								</a>
							</div>
							<div class="news-item-container">
								<a href="{{route('blog.isi-informasi', $informasi->slug)}}">
									<h2 class="news-title">
										{!!str_limit($informasi->title, 30, '....')!!}
									</h2>
								</a>
								<div class="news-meta">
									<span class="news-date">{{$informasi->created_at->isoFormat('D MMMM Y')}}</span>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="widget">
			<h3 class="widget-title">Categories</h3>
			<div class="widget-content">
				<div class="sidebar-categories">
					<ul>
						@foreach($widget_category as $hasil)
						<li>
							<a href="{{route('blog.category', $hasil->slug)}}">
								{{$hasil->name}}<span>{{$hasil->posts->count()}}</span>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="widget">
			<h3 class="widget-title">Tags</h3>
			<div class="widget-content">
				<div class="sidebar-tags">
					<ul>
						@foreach($widget_tags as $tags_widget)
						<li>
							<a href="{{route('blog.tags', $tags_widget->slug)}}"> 
								{{$tags_widget->name}}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div><!--end widget-tags-->
	</div>
</div>
</div>