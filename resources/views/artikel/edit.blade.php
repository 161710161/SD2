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
			  	<form action="{{ route('artikel.update',$artikel->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('judul_artikel') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul Artikel</label>	
			  			<input type="text" value="{{ $artikel->judul_artikel }}" name="judul_artikel" class="form-control"  required>
			  			@if ($errors->has('judul_artikel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul_artikel') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		<div class="form-group {{ $errors->has('dibuat') ? ' has-error' : '' }}">
			  			<label class="control-label">Dibuat</label>	
			  			<input type="date" value="{{ $artikel->dibuat }}" name="dibuat" class="form-control"  required>
			  			@if ($errors->has('dibuat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dibuat') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('ket_artikel') ? 'has-error' : ''}}">
								<label class="control-label">Keterangan Artikel</label>
								<input type="text" name="ket_artikel" class="form-control" value="{{$artikel->ket_artikel}}" required>
								@if ($errors->has('ket_artikel'))
									<span class="help-blocks">
										<strong>{{$errors->first('ket_artikel')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{ $errors->has('kategoriartikel_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Kategori</label>	
			  			<select name="kategoriartikel_id" class="form-control">
			  				@foreach($kategoriartikel as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKatl == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_artikel }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategoriartikel_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategoriartikel_id') }}</strong>
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