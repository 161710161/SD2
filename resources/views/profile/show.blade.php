@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Profile 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Visi dan Misi</label>	
			  			<input type="text" name="visimisi" class="form-control" value="{{ $a->visimisi}}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Sejarah</label>	
			  			<input type="text" name="sejarah" class="form-control" value="{{ $a->sejarah}}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">E-mail</label>	
			  			<input type="text" name="email" class="form-control" value="{{ $a->email}}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Telepon</label>	
			  			<input type="text" name="telepon" class="form-control" value="{{ $a->telepon}}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Lokasi</label>	
			  			<input type="text" name="lokasi" class="form-control" value="{{ $a->lokasi}}"  readonly>
			  		</div>


			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection