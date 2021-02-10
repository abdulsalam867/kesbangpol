@extends('template_backend.index')
@section('title', 'List Subscribe | Kesbangpol Lebak')
@section('sub-judul', 'Subscribe')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<table class="table table-responsive" width="100%">
					<thead>
						<tr style="text-align: center;">
							<th style="width: 30px;">#</th>
							<th>email</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subscribes as $result => $hasil)
						<tr style="text-align: center;">
							<td>{{$loop->iteration}}</td>
							<td style="text-align: justify;">{!!$hasil->email!!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection