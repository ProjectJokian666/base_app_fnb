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
				<h4 class="">DATA GUDANG</h4>
				<a href="{{url('transaksi/beli/add')}}" class="btn btn-primary btn-sm">
					TAMBAH
				</a>
			</div>
			<div class="card-body">
				<table class="table table-sm table-bordered text-center" id="datasatuan">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Jumlah</th>
							<th>Hrg Beli</th>
							<th>Tgl Beli</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data['trx_beli'] as $data)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								@if($data->gudangs!=null)
								{{$data->gudangs->nama}}
								@else
								DATA TELAH DIHAPUS
								@endif
							</td>
							<td>{{$data->jumlah}}</td>
							<td>{{$data->harga}}</td>
							<td class="d-flex justify-content-center">
								{{DATE('d-m-Y',strtotime($data->created_at))}}
								<!-- <form action="{{url('master/gudang/delete',$data->id)}}" method="POST">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
								</form> -->
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