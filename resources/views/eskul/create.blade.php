@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Eskul 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('eskul.store') }}" method="post" enctype="multipart/form-data">
			  		{{ csrf_field() }}

			  		<div class="form-group {{ $errors->has('nama_eskul') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Eskul</label>	
			  			<input type="text" name="nama_eskul" class="form-control"  required>
			  			@if ($errors->has('nama_eskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_eskul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>	
			  			<input type="file" name="foto" class="form-control"  required>
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('ket_eskul') ? ' has-error' : '' }}">
			  			<label class="control-label">Keterangan Eskul</label>	
			  			<input type="text" name="ket_eskul" class="form-control"  required>
			  			@if ($errors->has('ket_eskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ket_eskul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection