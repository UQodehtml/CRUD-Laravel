@extends('layout.admin')
@section('konten')
<h1 class="text-center mb-4">Edit Data Siswa</h1>

<div class="content-wrapper">
  <section class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <form action="/updatedata/{{ $data->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nis" class="nis">NIS :</label>
                  <input type="number" class="nis" id="nis" name="nis" value="{{ $data->nis }}">
                  {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>

                <div class="mb-3">
                  <label for="nama" class="form-label">Nama :</label>
                  <input type="name" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                </div>

                <div class="mb-3">
                  <label for="tanggallahir" class="form-label">Tanggal Lahir :</label>
                  <input type="date" class="form-control" id="tanggallahir" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                </div>

                <div class="mb-3">
                  <label for="jeniskelamin" class="form-label">Jenis Kelamin :</label>
                  <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <option selected {{ $data->jenis_kelamin }}>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat :</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
                </div>

                <div class="mb-3">
                  <label for="kota" class="form-label">Kota :</label>
                  <select class="form-select" aria-label="Default select example" name="id_kota">
                    <option selected>Pilih Kota</option>
    
                    @foreach ($kota as $id=>$kota)
                    <option value="{{ $id }}" {{ $id == $data->id_kota ? 'selected' : '' }}>{{ $kota }}</option>
                    @endforeach
                    
                  </select>
                  {{-- <input type="text" class="form-control" id="kota" name="kota" value="{{ $data->kota }}"> --}}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection