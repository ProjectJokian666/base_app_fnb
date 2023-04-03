@extends('layout.app')

@push('csss')
<link  href="{{asset('datatables/assets/dist/css/jquery.dataTables.min.css')}}" rel="stylesheet">
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
				<h4 class="">DATA PENJUALAN ( BAHAN {{$data['penjualan']->nama}} )</h4>
				<div>
					<a href="{{url('master/penjualan')}}" class="btn btn-success btn-sm">
						KEMBALI
					</a>
					<a href="{{url('master/penjualan/bahan',$data['penjualan']->id)}}/add" class="btn btn-primary btn-sm">
						TAMBAH
					</a>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-sm table-bordered text-center" id="datasatuan">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Jumlah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data['bahan'] as $bahan)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								@if($bahan->gudangs!=null)
								{{$bahan->gudangs->nama}}
								@else
								DATA TELAH TERHAPUS
								@endif
							</td>
							<td>{{$bahan->jumlah}}</td>
							<td class="d-flex justify-content-evenly">
								<form action="{{url('master/penjualan/bahan',$data['penjualan']->id)}}/ubah" method="POST">
									@csrf
									@method('patch')
									<button type="submit" value="{{$bahan->id_gudang}}" name="id_gudang" class="btn btn-primary btn-sm">Ubah</button>
								</form>
								<form action="{{url('master/penjualan/bahan',$data['penjualan']->id)}}/hapus" method="POST">
									@csrf
									@method('delete')
									<button type="submit" value="{{$bahan->id_gudang}}" name="id_gudang" class="btn btn-danger btn-sm">Hapus</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@push('jss')
<script src="{{asset('datatables/assets/dist/js/jquery.js')}}"></script>
<script src="{{asset('datatables/assets/dist/js/jquery.dataTables.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('#datasatuan').DataTable()
	})
</script>
@endpush