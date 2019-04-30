@extends('template.master')

@section('content')

	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Data Siswa</h3>

				@if(session('sukses'))
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  					{{ session('sukses') }}
				</div>
				@endif
				
				<div class="row">
					<div class="col-md-12">

						<!-- BASIC TABLE -->
						<div class="panel">
							<div class="modal-add" style="margin-left: 25px; margin-top: 20px;">
								<p class="demo-button">
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#datasiswa">
									<i class="fa fa-plus-square"></i></button>
								</p>
							</div>
							
							<div class="panel-body">
								<table class="table table-bordered table-hover">
									<thead class="bg-red">
										<tr>
		  	  	  							<th scope="col">#</th>
		  	  	  							<th scope="col">Nama Depan</th>
		  	  	  							<th scope="col">Nama Belakang</th>
		  	  	  							<th scope="col">Jenis Kelamin</th>
		  	  	  							<th scope="col">Agama</th>
		  	  	  							<th scope="col">Alamat</th>
		  	  	  							<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_siswa as $key => $siswa)
										<tr>
											<th scope="row">{{ $key+1 }}</th>
		  	  	  							<td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_depan }}</a></td>
											<td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang}}</a></td>
											<td>{{ $siswa->jenis_kelamin }}</td>
											<td>{{ $siswa->agama }}</td>
											<td>{{ $siswa->alamat }}</td>
											<td>
												<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="/siswa/{{$siswa->id}}/destroy" class="btn btn-danger btn-sm" 
													onclick="return confirm('Yakin mau di hapus?');">Hapus</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- END BASIC TABLE -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->


	<!-- Modal Tambah -->
	<div class="modal fade" id="datasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
  		  	<div class="modal-content">
  		    	<div class="modal-header">
  		      		<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
  		      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  		        		<span aria-hidden="true">&times;</span>
  		      		</button>
  		    	</div>
  		    	<div class="modal-body">
  		    		<form action="/siswa/create" method="post" enctype="multipart/form-data">
  		    			{{csrf_field()}}
						<div class="form-group {{ $errors->has('nama_depan') ? ' has-error' : ''}}">
						  	<label for="nama_depan">Nama Depan</label>
						  	<input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="{{ old('nama_depan') }}">
						  	@if($errors->has('nama_depan'))
						  		<span class="help-block">{{ $errors->first('nama_depan') }}</span>
						  	@endif
						</div>

						<div class="form-group {{ $errors->has('nama_belakang') ? ' has-error' : ''}}">
						    <label for="nama_belakang">Nama Belakang</label>
						    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="{{ old('nama_belakang') }}">
						    @if($errors->has('nama_belakang'))
						  		<span class="help-block">{{ $errors->first('nama_belakang') }}</span>
						  	@endif
						</div>

						<div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
						    <label for="email">Email</label>
						    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
						    @if($errors->has('email'))
						  		<span class="help-block">{{ $errors->first('email') }}</span>
						  	@endif
						</div>

						<div class="form-group {{ $errors->has('jenis_kelamin') ? ' has-error' : ''}}">
    						<label for="jenis_kelamin">Jenis Kelamin</label>
    						<select class="form-control" name="jenis_kelamin">
    							<option value="">--Pilih Gender--</option>
    						  	<option value="L" @if (old('jenis_kelamin') == "L") {{ 'selected' }} @endif>Laki-Laki</option>
    						  	<option value="P" @if (old('jenis_kelamin') == "P") {{ 'selected' }} @endif>Perempuan</option>
    						</select>
    						@if($errors->has('jenis_kelamin'))
						  		<span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
						  	@endif
  						</div>

						<div class="form-group {{ $errors->has('agama') ? ' has-error' : ''}}">
						    <label for="agama">Agama</label>
						    <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{ old('agama') }}">
						    @if($errors->has('agama'))
						  		<span class="help-block">{{ $errors->first('agama') }}</span>
						  	@endif
						</div>

						<div class="form-group {{ $errors->has('alamat') ? ' has-error' : ''}}">
						    <label for="alamat">Alamat</label>
						    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea> 
						    @if($errors->has('alamat'))
						  		<span class="help-block">{{ $errors->first('alamat') }}</span>
						  	@endif
						</div>

                		<div class="form-group {{ $errors->has('avatar') ? ' has-error' : ''}}">
                		    <label for="avatar">Avatar</label>
                		    <input type="file" name="avatar" class="form-control">
                		    @if($errors->has('avatar'))
						  		<span class="help-block">{{ $errors->first('avatar') }}</span>
						  	@endif
                		</div>   
						
						<div class="modal-footer">
  		      				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  		      				<button type="submit" class="btn btn-primary">Save</button>
  		    			</div>	
					</form>
  		    	</div>
  		  	</div>
  		</div>
  	</div>

@endsection