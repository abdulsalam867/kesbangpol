@include('template_frontend.header')
<section class="main-content mt-3">
	<div class="container">
		@yield('isi')
		@include('template_frontend.widget')
	</div>
</section>

@include('template_frontend.footer')