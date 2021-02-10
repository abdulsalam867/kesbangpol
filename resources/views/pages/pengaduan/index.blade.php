@extends('template_backend.index')
@section('title', 'Daftar Pengaduan | Kesbangpol Lebak')
@section('sub-judul', 'Daftar Pengaduan')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<table id="tabel_umum" class="display" width="100%">
					<thead>
						<tr style="text-align: center;">
							<th>No.</th>
							<th>Title</th>
							<th>email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pengaduan as $result => $hasil)
						<tr style="text-align: center;">
							<td>{{$loop->iteration}}</td>
							<td style="text-align: justify;">{{$hasil->title}}</td>
							<td>{{$hasil->email}}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
										Opsional
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
										<form action="{{ route('pengaduan.destroy', $hasil->id) }}" method="POST">
											@csrf
											@method('delete')
											<a href="{{ route('pengaduan.show', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-eye"></i> View</a>
											<button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
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