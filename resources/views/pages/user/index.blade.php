@extends('template_backend.index')
@section('title', 'Daftar User | Kesbangpol Lebak')
@section('sub-judul', 'List User')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('user.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data
				</a>
			</div>
			<div class="card-body">
				<table id="tabel_umum" class="display" width="100%">
					<thead> 
						<tr>
							<th style="text-align: center;">No.</th>
							<th style="text-align: center;">Name</th>
							<th style="text-align: center;">Email</th>
							<th style="text-align: center;">Tipe</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user as $result => $hasil)
						<tr>
							<td style="text-align: center;">{{$loop->iteration }}</td>
							<td style="text-align: center;">{{$hasil->name}}</td>
							<td style="text-align: center;">{{$hasil->email}}</td>
							<td style="text-align: center;">
								@if($hasil->tipe)
								Administrator
								@else
								Pengguna
								@endif
							</td>
							<td style="text-align: center;">
								<div class="btn-group">
									<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
										Opsional
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
										<form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
											@csrf
											@method('delete')
											<a href="{{ route('user.edit', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
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