@extends('template_backend.index')
@section('title', 'Edit Category | Kesbangpol Lebak')
@section('sub-judul', 'Edit Category')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('category.index')}}" class="btn bg-gradient-success btn-xs float-right">
					<i class="fas fa-arrow-right"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{route('category.update', $category->id)}}" method="POST">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Kategori disini" value="{{$category->name}}">
						@error('name')
							<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-gradient-info btn-xs">Update Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection