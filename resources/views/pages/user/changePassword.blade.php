@extends('template_backend.index')
@section('title', 'Ganti Password | Kesbangpol Lebak')
@section('sub-judul', 'Ganti Password')
@section('content') 
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a href="{{url('dashboard')}}" class="btn btn-success btn-xs float-right"><i class="fas fa-arrow-right"></i> Kembali</a>
			</div>
			<div class="card-body">
				<form action="{{route('postChangePassword')}}" id="changePasswordForm" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<input id="password_lama" name="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" placeholder="Password Lama">
						@if($errors->any('password_lama'))
						<span class="help-block text-danger">{{$errors->first('password_lama')}}</span>
						@endif
					</div>
					<div class="form-group">
						<input id="new_password" name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Password Baru">
						@if($errors->any('new_password'))
						<span class="help-block text-danger">{{$errors->first('new_password')}}</span>
						@endif
					</div>
					<div class="form-group">
						<input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
						@if($errors->any('password_confirmation'))
						<span class="help-block text-danger">{{$errors->first('password_confirmation')}}</span>
						@endif
					</div>
					<div class="mt-3"> 
						<button type="submit" class="btn bg-gradient-primary btn-sm">Ganti Password</button>
						<a href="/dashboard" class="btn bg-gradient-success btn-sm">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection