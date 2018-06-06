@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Lihat Berita 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">

			  		<div class="form-group">
			  			<label class="control-label">Judul Artikel</label>
						<input type="text" name="title" class="form-control" value="{{ $artikel->judul_artikel }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Dibuat</label>
						<input type="text" name="title" class="form-control" value="{{ $artikel->dibuat }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Keterangan Artikel</label>
						<input type="text" name="title" class="form-control" value="{{ $artikel->ket_artikel }}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Nama Kategori</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $artikel->kategoriartikel->nama_artikel }}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection