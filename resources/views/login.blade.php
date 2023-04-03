@extends('layout.app')

@push('css')

@endpush

@section('content')
@if(session('log'))
<div class="alert alert-success d-flex justify-content-between" role="alert">
	{{session('log')}}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('gagal'))
<div class="alert alert-danger d-flex justify-content-between" role="alert">
	{{session('gagal')}}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="d-flex align-items-center justify-content-center">
	<div class="card mt-4">
		<div class="card-header">
			LOGIN
		</div>
		<div class="card-body row">
			<form action="{{url('login/post')}}" method="POST">
				@csrf

				<div class="form-floating">
					<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="MASUKKAN EMAIL" value="{{ old('email') }}">
					
					<label for="email">EMAIL</label>
					@error('email')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<br>
				<div class="form-floating">
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="MASUKKAN PASSWORD" value="{{ old('password') }}">
					
					<label for="password">PASSWORD</label>
					@error('password')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>

				<div class="col-12 mt-4 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary btn-sm">LOGIN</button>
				</div>

			</form>
		</div>
	</div>
</section>

@endsection

@push('jss')

@endpush