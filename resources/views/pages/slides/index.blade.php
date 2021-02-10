@extends('template_backend.index')
@section('title', 'Slide Image | Kesbangpol Lebak')
@section('sub-judul', 'Slide Image')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('slideImages.create')}}" class="btn bg-gradient-primary btn-xs float-right">
					<i class="fas fa-plus"></i> Tambah Data</a>
				</div>
				<div class="card-body">
					<table id="tabel_umum" class="display" width="100%">
						<thead>
							<tr style="text-align: center;">
								<th>No.</th>
								<th style="text-align: justify;">Caption</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($slides as $slide => $hasil)
							<tr>
								<td style="text-align: center;width: 20px;">{{$loop->iteration }}</td>
								<td style="text-align: justify;">{{$hasil->title}}</td>
								<td style="text-align: center;">
									<img src="{{asset($hasil->image) }}" class="img-fluid" style="width:50px;">
								</td>
								<td style="text-align: center;">
									<div class="btn-group">
										<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
											Opsional
										</button>
										<div class="dropdown-menu dropdown-menu-right" role="menu" style="font-size: 12px; width: 20px;">
											<form action="{{ route('slideImages.destroy', $hasil->id) }}" method="POST">
												@csrf
												@method('delete')
												<a href="{{ route('slideImages.edit', $hasil->id) }}" class="dropdown-item text-success"><i class="fas fa-edit"></i> Edit</a>
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