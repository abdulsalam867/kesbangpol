@extends('template_backend.index')
@section('title', 'Edit User | Kesbangpol Lebak')
@section('sub-judul', 'Edit User')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{route('user.index')}}" class="btn btn-success btn-xs float-right"><i class="fas fa-arrow-right"></i> Kembali</a>
			</div>
			<div class="card-body">
				<form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama User" value="{{$user->name}}">
						@error('name')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nama Email" value="{{$user->email}}">
						@error('email')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<select class="form-control custom-select @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
							<option value="" holder>Pilih Tipe User</option>
								<option value="1" holder
								@if($user->tipe == 1)
									selected
								@endif
								>Administrator</option>
								<option value="0" holder
								@if($user->tipe == 0)
									selected
								@endif
								>Pengguna</option>
						</select>
						@error('tipe')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
					</div>
					<div class="form-group">
						<button class="btn bg-gradient-primary btn-sm"><i class="fas fa-paper-plane"></i> Update Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection