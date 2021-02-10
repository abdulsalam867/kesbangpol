@extends('template_frontend.index')
@section('isi')
<div class="row mt-3">
	<div class="col-lg-8 col-md-12">
		<div class="post-title">
			<h4>Daftar Pegawai Badan Kesbangpol Lebak</h4>
			<hr>
		</div>
		<div class="post-body">
			<table id="tabel_pegawai" class="display" width="100%">
				<thead>
					<tr style="text-align: center;">
						<th>No.</th>
						<th>Nama</th>
						<th>NIP.</th>
						<th>Jabatan</th>
						<th>Photo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $pegawai)
					<tr>
						<td style="text-align: center;">{{$loop->iteration}}</td>
						<td>
							{{$pegawai->nama}}
						</td>
						<td style="text-align: center;">{{$pegawai->nip}}</td>
						<td>{{$pegawai->jabatan}}</td>
						<td style="text-align: center;">
							<img src="{{$pegawai->avatar}}" class="img-fluid" width="35" height="35">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		@endsection

		
		