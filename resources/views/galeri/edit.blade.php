@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Berita 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('galeri.update',$galeri->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('judul_galeri') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul Galeri</label>	
			  			<input type="text" value="{{ $galeri->judul_galeri }}" name="judul_galeri" class="form-control"  required>
			  			@if ($errors->has('judul_galeri'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul_galeri') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('ket_galeri') ? 'has-error' : ''}}">
								<label class="control-label">Keterangan Galeri</label>
								<input type="text" name="ket_galeri" class="form-control" value="{{$galeri->ket_galeri}}" required>
								@if ($errors->has('ket_galeri'))
									<span class="help-blocks">
										<strong>{{$errors->first('ket_galeri')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{ $errors->has('kategorigaleri_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Kategori</label>	
			  			<select name="kategorigaleri_id" class="form-control">
			  				@foreach($kategorigaleri as $data)
			  				<option value="{{ $data->id }}" {{ $selectedGtl == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_galeri }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategorigaleri_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategorigaleri_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection