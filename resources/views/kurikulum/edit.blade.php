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
			  	<form action="{{ route('kurikulum.update',$kurikulum->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('nama_kurikulum') ? ' has-error' : '' }}">
			  			<label class="control-label">Kurikulum</label>	
			  			<input type="text" value="{{ $kurikulum->nama_kurikulum }}" name="nama_kurikulum" class="form-control"  required>
			  			@if ($errors->has('nama_kurikulum'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kurikulum') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('ket_kurikulum') ? 'has-error' : ''}}">
								<label class="control-label">Keterangan Kurikulum</label>
								<input type="text" name="ket_kurikulum" class="form-control" value="{{$kurikulum->ket_kurikulum}}" required>
								@if ($errors->has('ket_kurikulum'))
									<span class="help-blocks">
										<strong>{{$errors->first('ket_kurikulum')}}</strong>
									</span>
								@endif
							</div>

			  		<div class="form-group {{$errors->has('nama_kepsek') ? 'has-error' : ''}}">
								<label class="control-label">Kepala Sekolah</label>
								<input type="text" name="nama_kepsek" class="form-control" value="{{$kurikulum->nama_kepsek}}" required>
								@if ($errors->has('nama_kepsek'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_kepsek')}}</strong>
									</span>
								@endif
							</div>
                            
			  		<div class="form-group {{$errors->has('nama_wkepsek') ? 'has-error' : ''}}">
								<label class="control-label">Wakil Kepala Sekolah</label>
								<input type="text" name="nama_wkepsek" class="form-control" value="{{$kurikulum->nama_wkepsek}}" required>
								@if ($errors->has('nama_wkepsek'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_wkepsek')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{ $errors->has('guru_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Guru</label>	
			  			<select name="guru_id" class="form-control">
			  				@foreach($guru as $data)
			  				<option value="{{ $data->id }}" {{ $selectedGuru == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_guru }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('guru_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('guru_id') }}</strong>
                            </span>
                        @endif
			  		</div>
                      
					<div class="form-group {{ $errors->has('staf_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Staf</label>	
			  			<select name="staf_id" class="form-control">
			  				@foreach($staf as $data)
			  				<option value="{{ $data->id }}" {{ $selectedStaf == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_staf }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('staf_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('staf_id') }}</strong>
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