@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Galeri 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('fasilitas.update',$a->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_fasilitas') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>
			  			<input type="text" name="nama_fasilitas" class="form-control" value="{{ $a->nama_fasilitas }}"  required>
			  			@if ($errors->has('nama_fasilitas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_fasilitas') }}</strong>
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