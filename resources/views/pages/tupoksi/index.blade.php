@extends('template_backend.index')
@section('title', 'Tupoksi | Kesbangpol Lebak')
@section('sub-judul', 'Tupoksi')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('tupoksi.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data
				</a>
			</div>
			<div class="card-body">
				<table id="tabel_umum" class="display" width="100%">
					<thead>
						<tr style="text-align: center;">
							<th>No.</th>
							<th>Tupoksi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tupoksi as $result => $hasil)
						<tr style="text-align: center;">
							<td>{{$loop->iteration}}</td>
							<td style="text-align: justify;">{!!$hasil->content!!}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
										Opsional
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
										<form action="{{ route('tupoksi.destroy', $hasil->id) }}" method="POST">
											@csrf
											@method('delete')
											<a href="{{ route('tupoksi.edit', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
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