@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Visi dan Misi Badan Kesbangpol Lebak</h4>
			<hr>
		</div>
		<div class="post-body">
			@foreach($data as $result)
			<h5 class="blog-post-title">Visi Badan Kesbangpol Lebak</h5>
			<p>
				{!!$result->visi!!}
			</p>
			<h5 class="blog-post-title">Misi Badan Kesbangpol Lebak</h5>
			<p>
				{!!$result->misi!!}
			</p>
			@endforeach
		</div>
@endsection
