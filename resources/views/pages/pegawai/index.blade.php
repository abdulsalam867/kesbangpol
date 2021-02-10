@extends('template_backend.index')
@section('title', 'Pegawai | Kesbangpol Lebak')
@section('sub-judul', 'Pegawai')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('pegawai.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data</a>
				</div>
				<div class="card-body">
					<table id="tabel_umum" class="display" width="100%">
						<thead>
							<tr style="text-align: center;">
								<th style="text-align: center;font-size: 10px;">#</th>
								<th>Foto</th>
								<th>Nama</th>
								<th>Nip</th>
								<th>Pangkat</th>
								<th>Golongan</th>
								<th>Jabatan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pegawai as $result => $hasil)
							<tr style="text-align: center;">
								<td>{{$loop->iteration }}</td>
								<td>
									<img src="{{$hasil->avatar}}" class="img-fluid" width="50">
								</td>
								<td style="text-align: justify;">{{$hasil->nama}}</td>
								<td>{{$hasil->nip}}</td>
								<td>{{$hasil->pangkat}}</td>
								<td>{{$hasil->golongan}}</td>
								<td style="text-align: justify;">{{$hasil->jabatan}}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
											Opsional
										</button>
										<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
											<form action="{{route('pegawai.destroy', $hasil->id) }}" method="POST">
												@csrf
												@method('delete')
												<a href="{{route('pegawai.edit', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
												<button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Hapus</button>
											</form>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	@endsection