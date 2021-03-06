@extends('template_backend.index')
@section('title', 'Keputusan Bupati | Kesbangpol Lebak')
@section('sub-judul', 'Keputusan Bupati')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('kepbup.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data
				</a>
			</div>
			<div class="card-body">
				<table id="tabel_umum" class="display" width="100%">
					<thead>
						<tr style="text-align: center;">
							<th>#</th>
							<th>Nomor</th>
							<th>Tahun</th>
							<th>Tentang</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($kepbup as $result => $hasil)
						<tr style="text-align: center;">
							<td>{{$loop->iteration}}</td>
							<td>{{$hasil->nomor}}</td>
							<td>{{$hasil->tahun}}</td>
							<td style="text-align: justify;">{{$hasil->tentang}}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
										Opsional
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
										<form action="{{ route('kepbup.destroy', $hasil->id) }}" method="POST">
											@csrf
											@method('delete')
											<a href="{{ route('kepbup.edit', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
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