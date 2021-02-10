@extends('template_backend.index')
@section('title', 'Organisasi Kemasyarakatan | Kesbangpol Lebak')
@section('sub-judul', 'Data Ormas')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('ormas.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data
				</a>
			</div>
			<div class="card-body">
				<table id="tabel_umum" class="display" width="100%">
					<thead>
						<tr style="text-align: center;">
							<th>#</th>
							<th>Nomor Surat</th>
							<th>Nama Ormas</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ormas as $result => $hasil)
						<tr style="text-align: center;">
							<td>{{$loop->iteration}}</td>
							<td>{{$hasil->no_surat}}</td>
							<td>{{$hasil->nama}}</td>
							<td style="text-align: justify;">{!!$hasil->alamat!!}</td>
							<td>{{$hasil->telpon}}</td>
							<td style="text-align: center;">
								@if($hasil->status == 1)
								<span class="badge badge-info">Terdaftar</span>
								@endif
								@if($hasil->status == 2)
								<span class="badge badge-warning">Tidak Terdaftar</span>
								@endif
								@if($hasil->status == 3)
								<span class="badge badge-danger">Tidak Disetujui</span>
								@endif
							</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
										Opsional
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
										<form action="{{ route('ormas.destroy', $hasil->id) }}" method="POST">
											@csrf
											@method('delete')
											<a href="{{ route('ormas.edit', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
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