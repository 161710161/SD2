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
			  			<label class="control-label">Judul Galeri</label>
						<input type="text" name="title" class="form-control" value="{{ $galeri->judul_galeri }}"  readonly>
			  		</div>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Keterangan Galeri</label>
						<input type="text" name="title" class="form-control" value="{{ $galeri->ket_galeri }}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Kategori</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $galeri->kategorigaleri->nama_galeri }}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection