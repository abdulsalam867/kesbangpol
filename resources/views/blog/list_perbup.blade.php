@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Daftar Peraturan Bupati pada Badan Kesbangpol Lebak</h4>
			<hr>
		</div>
		<div class="post-body">
			@foreach($data as $result)
			<ol>
				<li>
					<a href="{{route('download.perbup', $result->id)}}" target="_blank">
						{{$result->file}}
					</a>
				</li>
			</ol>
			@endforeach
		</div>

		@endsection

		
		