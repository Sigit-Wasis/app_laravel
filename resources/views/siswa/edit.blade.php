@extends ('template.master')    
  
  @section('content')
  
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
    @endif
    <div class="row">
      <div class="col-lg-12">
      <form action="/siswa/{{$siswa->id}}/update" method="post">
            {{csrf_field()}}
                
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" value="{{ $siswa->nama_depan }}" name="nama_depan" class="form-control" placeholder="Nama Depan">
            </div>
            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" value="{{ $siswa->nama_belakang }}" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                  <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                  <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
              </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" value="{{ $siswa->agama }}" name="agama" class="form-control" placeholder="Agama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" value="{{ $siswa->alamat }}" name="alamat" class="form-control" placeholder="Alamat">
            </div>
            
                    <a href="/siswa" class="btn btn-danger float-left">Close</a>
                    <button type="submit" class="btn btn-warning float-right">Update</button>
          </form>
          </div>
    </div>
  </div>

  @endsection