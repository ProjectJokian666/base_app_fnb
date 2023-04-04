@extends('layout.app')

@push('csss')
@endpush

@section('content')
<div class="row align-items-center justify-content-center">
	<div class="col-6">
		@if(session('sukses'))
		<div class="alert alert-success d-flex justify-content-between" role="alert">
			{{session('sukses')}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@elseif(session('gagal'))
		<div class="alert alert-danger d-flex justify-content-between" role="alert">
			{{session('gagal')}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="">FORM UPDATE SATUAN</h4>
			</div>
			<div class="card-body">
				<form action="{{url('master/satuan/update',$data->id)}}" method="POST" class="row">
					@csrf
					@method('patch')
					<div class="col-12">
						<label for="satuan" class="form-label">SATUAN</label>
						<input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" placeholder="MASUKKAN SATUAN" value="{{ $data->satuan }}">
						@error('satuan')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="col-12 mt-4 d-flex justify-content-between">
						<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
						<a href="{{url('master/satuan')}}" class="btn btn-danger btn-sm">KEMBALI</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('jss')

@endpush