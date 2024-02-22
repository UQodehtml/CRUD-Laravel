@extends('layout.admin')
@section('konten')
<h1 class="text-center mb-4 mt-4">Edit Data Kota</h1>

<div class="container justify-content-center">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <form action="/updatekota/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nis" class="nis">Kota :</label>
              <input type="text" class="nis" id="nis" name="kota" value="{{ $data->kota }}">
              @error('kota')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection