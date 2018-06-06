@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Eskul 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Eskul</label>	
			  			<input type="text" name="nama_eskul" class="form-control" value="{{ $a->nama_eskul}}"  readonly>
			  		</div>

			  		<div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Keterangan Eskul</label>	
			  			<input type="text" name="ket_eskul" class="form-control" value="{{ $a->ket_eskul}}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection