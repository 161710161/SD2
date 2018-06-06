@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Prestasi 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Prestasi</label>	
			  			<input type="text" name="nama_prestasi" class="form-control" value="{{ $a->nama_prestasi}}"  readonly>
			  		</div>
			  		</div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Keterangan Prestasi</label>	
			  			<input type="text" name="ket_prestasi" class="form-control" value="{{ $a->ket_prestasi}}"  readonly>
			  		</div>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection