@extends('layout.admin')
@section('konten')
<h1 class="text-center mb-4 mt-4">Tambah Data Siswa</h1>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <form action="/insertsiswa" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nis" class="nis">NIS :</label>
              <input type="number" class="nis" id="nis" name="nis">
              @error('nis')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="nama" class="form-label">Nama :</label>
              <input type="name" class="form-control" id="nama" name="nama">
              @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="tanggallahir" class="form-label">Tanggal Lahir :</label>
              <input type="date" class="form-control" id="tanggallahir" name="tanggal_lahir">
            </div>

            <div class="mb-3">
              <label for="jeniskelamin" class="form-label">Jenis Kelamin :</label>
              <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                <option selected>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              @error('jenisKelamin')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat :</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            <div class="mb-3">
              <label for="kota" class="form-label">Kota :</label>
              <select class="form-select" aria-label="Default select example" name="id_kota">
                <option selected>Pilih Kota</option>

                @foreach ($datakota as $kota)
                <option value="{{ $kota->id }}">{{ $kota->kota }}</option>
                @endforeach
                
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection