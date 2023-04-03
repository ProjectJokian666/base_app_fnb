@extends('layout.app')

@push('csss')
@endpush

@section('content')
<section class="">
	<div class="row align-items-center justify-content-center">
		@if(session('gagal'))
		<div class="alert alert-danger d-flex justify-content-between" role="alert">
			{{session('gagal')}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<br>
		<div class="col-6">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="">FORM UBAH BAHAN {{ $data['penjualan']->nama }}</h4>
				</div>
				<div class="card-body">
					<form action="{{url('master/penjualan/bahan',$data['penjualan']->id)}}/ubah_data" method="POST" class="row">
						@csrf
						@method('patch')
						<div class="col-12 input-group-sm">
							<label for="bahan" class="form-label">BAHAN</label>
							<select id="bahan" name="bahan" class="form-select">
								@foreach($data['gudang'] as $gudang)
								<option value="{{$gudang['id']}}" <?= $gudang['id']==$data['id_gudang'] ? 'selected' : '' ?>>{{$gudang['nama']}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-12 input-group-sm">
							<label for="jumlah" class="form-label">JUMLAH</label>
							<input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="MASUKKAN JUMLAH BAHAN" value="{{ $data['bahan']->jumlah }}">
							@error('jumlah')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>

						<div class="col-12 mt-4 d-flex justify-content-between">
							<button type="submit" name="id_gudang" value="{{$data['id_gudang']}}" class="btn btn-primary btn-sm">UBAH</button>
							<a href="{{url('master/penjualan/bahan',$data['penjualan']->id)}}" class="btn btn-danger btn-sm">BATAL</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('jss')

@endpush