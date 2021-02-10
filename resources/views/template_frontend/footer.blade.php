<footer class="footer mt-3">
	<div class="container">
		<div class="widget-container">
			<div class="row">
				<div class="col-lg-4 col-md-12">
					<div class="footer-widget-content">
						<h3>Alamat Kantor</h3>
						<hr>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31722.54307803319!2d106.2294691681798!3d-6.352877255772065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4216d954b7250b%3A0x367aed87862ad932!2sKantor%20Kesatuan%20Bangsa%20dan%20Politik%20Kabupaten%20Lebak!5e0!3m2!1sid!2sid!4v1608319498319!5m2!1sid!2sid" width="100%" height="210" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="footer-widget-content">
						<h3>Popular Posts</h3>
						<hr>
						<div class="footer-post">
							<ul class="latest-news">
								@foreach($footer_post as $data)
								<li class="clearfix">
									<div class="latest-news-item">
										<div class="item-thumbnail">
											<a href="{{route('blog.isi', $data->slug)}}">
												<img src="{{asset($data->gambar)}}" class="img-fluid" alt="">
											</a>
										</div>
										<div class="news-item-container">
											<h2 class="footer-news-title">
												<a href="{{route('blog.isi', $data->slug)}}">
													{!!str_limit($data->title, 40, '....')!!}
												</a>
											</h2>
											<div class="footer-news-meta">
												<span class="footer-news-date">
													{{$data->created_at->isoFormat('D MMMM Y')}}
												</span>
											</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="footer-widget-content">
						<h3>Our News Letter</h3>
						<hr>
						<div class="newsletter mt-4">
							<div class="icon">
								<i class="fas fa-envelope"></i>
							</div>
							<h5>News Letter</h5>
							<p>Stay up to date with our latest news</p>
							<div class="subscribe-form mt-5">
								<form action="{{route('blog.postSubscribes')}}" method="POST">
									@csrf
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email Address">
									@error('email')
									<div class="invalid-feedback">{{$message}}</div>
									@enderror
									<input type="submit" value="Subscribe">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="copyright-section mt-3">
		<div class="container d-flex justify-content-center">
			<p>Copyright &copy;, 2020 Kesbangpol Lebak Team</p>
		</div>
	</div>
</footer>
</div>

<script src="{{asset('lib/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('lib/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lib/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lib/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/js/holder.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/lte/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('lib/js/custom.js')}}"></script>
<script src="{{asset('lib/js/tabel.js')}}"></script>>
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script src="{{asset('vendor/lte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('vendor/lte/plugins/toastr/toastr.min.js')}}"></script>

<script>
	$(function () {

		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});
		
		bsCustomFileInput.init();

		$('.custom-file-input').on('change', function() { 
			let fileName = $(this).val().split('\\').pop(); 
			$(this).next('.custom-file-label').addClass("selected").html(fileName); 
		});

		ClassicEditor
		.create( document.querySelector( '#content' ), {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'alignment' , 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment' ],
			heading: {
				options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
				]
			}
		} )
		.catch( error => {
			console.error( error );
		} );
	});
</script>
</body>
</html>