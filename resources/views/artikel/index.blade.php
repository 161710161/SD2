@extends('layouts.admin')
@section('content')

	<div class="row">
	<div class="container">
	<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Data Artikel
			<div class="panel-title pull-right"><a href="{{ route('artikel.create') }}">Tambah Data</a>
		</div>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table">
	<thead>
		<tr>
					<th>No</th>
					<th>Judul Artikel</th>
					<th>Dibuat</th>
					<th>Keterangan Artikel</th>
					<th>Kategori</th>
					<th colspan="3">Action</th>
				</tr>	
	           </thead>
	             <tbody>
		            <?php $nomor = 1; ?>
		  		@php $no = 1; @endphp
		  		@foreach($artikel as $data)
                         <tr>
                            <td>{{$no++}}</td>
							<td>{{$data->judul_artikel}}</td>
							<td>{{$data->dibuat}}</td>
							<td>{{$data->ket_artikel}}</td>
							<td>{{$data->kategoriartikel->nama_artikel}}</td>
							<td>
		<a class="btn btn-primary" href=" {{ route('artikel.edit',$data->id)}} ">Ubah</a>
	</td>
	<td>
		<a class="btn btn-success" href=" {{ route('artikel.show',$data->id)}} ">Lihat</a>
	</td>
	<td>
		<form method="post" action="{{ route('artikel.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Hapus</button>
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
	</div>
	</div>
	@endsection