@extends('template.master')

@section('content')

	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
  		{{ session('sukses') }}
	</div>
	@endif
	<div class="row">
		<div class="col-6">
			<h2>Data Siswa</h2>
		</div>	
		<div class="col-6">
			<button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#datasiswa">
			  Tambah
			</button>
		</div>
	
		<table class="table table-bordered table-hover">
		  	<thead class="thead-light"> 
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
		  	  	  	<td>{{ $siswa->nama_depan }}</td>
					<td>{{ $siswa->nama_belakang }}</td>
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
  		    		<form action="/siswa/create" method="post">
  		    			{{csrf_field()}}
						<div class="form-group">
						  	<label for="nama_depan">Nama Depan</label>
						  	<input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan">
						</div>
						<div class="form-group">
						    <label for="nama_belakang">Nama Belakang</label>
						    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
						</div>
						<div class="form-group">
    						<label for="jenis_kelamin">Jenis Kelamin</label>
    						<select class="form-control" name="jenis_kelamin">
    						  <option value="L">Laki-Laki</option>
    						  <option value="P">Perempuan</option>
    						</select>
  						</div>
						<div class="form-group">
						    <label for="agama">Agama</label>
						    <input type="text" name="agama" class="form-control" placeholder="Agama">
						</div>
						<div class="form-group">
						    <label for="alamat">Alamat</label>
						    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
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