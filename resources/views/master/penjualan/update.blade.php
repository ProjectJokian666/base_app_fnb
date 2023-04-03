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
				<form action="{{url('master/penjualan/update',$data['penjualan']->id)}}" method="POST" class="row">
					@csrf
					@method('patch')
					<div class="col-12 input-group-sm">
						<label for="nama" class="form-label">NAMA BARANG</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="MASUKKAN NAMA" value="{{ $data['penjualan']->nama }}">
						@error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="col-12 input-group-sm">
						<label for="hpp" class="form-label">HPP</label>
						<input type="number" class="form-control @error('hpp') is-invalid @enderror" id="hpp" name="hpp" placeholder="MASUKKAN HPP" value="{{ $data['penjualan']->hrg_jual }}">
						@error('hpp')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="col-12 mt-4 d-flex justify-content-between">
						<button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
						<a href="{{url('master/penjualan')}}" class="btn btn-danger btn-sm">KEMBALI</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('jss')

@endpush