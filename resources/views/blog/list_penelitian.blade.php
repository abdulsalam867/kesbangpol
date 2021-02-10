@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		@foreach($data as $hasil)
		<div class="post-title">
			<h4>{{$hasil->title}}</h4>
			<hr>
		</div>
		<div class="post-body">
			<p>
				{!!$hasil->content!!}
			</p>
		</div>
		@endforeach
@endsection
