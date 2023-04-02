@extends('layout.app')

@push('csss')
@endpush

@section('content')
<div class="row">
	<div class="col-12">
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
				<h4 class="">FORM ADD STOK GUDANG</h4>
			</div>
			<div class="card-body">
				<form action="{{url('master/gudang/update',$data['gudang']->id)}}" method="POST" class="row">
					@csrf
					@method('patch')
					<div class="col-12 input-group-sm">
						<label for="nama" class="form-label">NAMA BARANG</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="MASUKKAN NAMA" value="{{ $data['gudang']->nama }}">
						@error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="col-12 input-group-sm">
						<label for="satuan" class="form-label">SATUAN</label>
						<select id="satuan" name="satuan" class="form-select">
							@foreach($data['satuan'] as $satuan)
							<option value="{{$satuan->id}}" <?= $satuan->id==$data['gudang']->id_satuan ? 'selected' : '' ?>>{{$satuan->satuan}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-12 input-group-sm">
						<label for="stok" class="form-label">STOK</label>
						<input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="MASUKKAN STOK" value="{{$data['gudang']->stok}}">
						@error('stok')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="col-12 input-group-sm">
						<label for="hpp" class="form-label">HPP</label>
						<input type="number" class="form-control @error('hpp') is-invalid @enderror" id="hpp" name="hpp" placeholder="MASUKKAN HPP" value="{{ $data['gudang']->hpp }}">
						@error('hpp')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="col-12 mt-4 d-flex justify-content-between">
						<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
						<a href="{{url('master/gudang')}}" class="btn btn-danger btn-sm">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('jss')

@endpush