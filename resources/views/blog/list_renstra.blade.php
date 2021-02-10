@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Renstra Kesbangpol Lebak</h4>
			<hr>
		</div>
		<div class="post-body">
			@foreach($data as $hasil)
			<p>
				{!!$hasil->content!!}
			</p>
			@endforeach
		</div>
@endsection
