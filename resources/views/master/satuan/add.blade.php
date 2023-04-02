@extends('layout.app')

@push('csss')
@endpush

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="">FORM ADD SATUAN</h4>
			</div>
			<div class="card-body">
				<form action="{{url('master/satuan/create')}}" method="POST" class="row">
					@csrf
					<div class="col-12">
						<label for="satuan" class="form-label">SATUAN</label>
						<input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" placeholder="MASUKKAN SATUAN" value="{{ old('satuan') }}">
						@error('satuan')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="col-12 mt-4 d-flex justify-content-between">
						<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
						<a href="{{url('master/satuan')}}" class="btn btn-danger btn-sm">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('jss')

@endpush