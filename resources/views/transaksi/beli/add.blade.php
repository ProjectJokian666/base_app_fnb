@extends('layout.app')

@push('csss')
@endpush

@section('content')
<div class="row align-items-center justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="">FORM ADD TRX GUDANG</h4>
			</div>
			<div class="card-body">
				<form action="{{url('transaksi/beli/create')}}" method="POST" class="row">
					@csrf

					<div class="col-12 input-group-sm">
						<label for="barang" class="form-label">BARANG GUDANG</label>
						<select id="barang" name="barang" class="form-select">
							@foreach($data['gudang'] as $data)
							<option value="{{$data->id}}">{{$data->nama}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-12 input-group-sm">
						<label for="stok" class="form-label">STOK</label>
						<input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="MASUKKAN STOK" value="{{ old('stok') ? old('stok') : '0' }}">
						@error('stok')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="col-12 mt-4 d-flex justify-content-between">
						<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
						<a href="{{url('transaksi/beli')}}" class="btn btn-danger btn-sm">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('jss')

@endpush