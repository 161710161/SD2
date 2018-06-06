@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Staf 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('prestasi.update',$a->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_prestasi') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Prestasi</label>
			  			<input type="text" name="nama_prestasi" class="form-control" value="{{ $a->nama_prestasi }}"  required>
			  			@if ($errors->has('nama_prestasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_prestasi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('ket_prestasi') ? ' has-error' : '' }}">
			  			<label class="control-label">Keterangan Prestasi</label>
			  			<input type="text" name="ket_prestasi" class="form-control" value="{{ $a->ket_prestasi }}"  required>
			  			@if ($errors->has('ket_prestasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ket_prestasi') }}</strong>
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