@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Daftar Partai Politik pada Badan Kesbangpol Lebak</h4>
			<hr>
		</div>
		<div class="post-body">
			<table id="tabel_ormas" class="display" width="100%">
				<thead>
					<tr style="text-align: center;">
						<th>No.</th>
						<th>Nama Parpol</th>
						<th>Alamat</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $parpol)
					<tr>
						<td style="text-align: center;">{{$loop->iteration}}</td>
						<td>
							{{$parpol->nama}}
						</td>
						<td>{!!$parpol->alamat!!}</td>
						<td style="text-align: center;">
								@if($parpol->status == 1)
								<span class="badge badge-info">Terdaftar</span>
								@endif
								@if($parpol->status == 2)
								<span class="badge badge-warning">Tidak Terdaftar</span>
								@endif
								@if($parpol->status == 3)
								<span class="badge badge-danger">Tidak Disetujui</span>
								@endif
							</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		@endsection

		
		