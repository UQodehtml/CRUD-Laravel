<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- cdn bootstrap.css--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Toastr.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{--  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Siswa | AdminSiswa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light container">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <h1 class="text-center mb-4">Data Siswa</h1>

      <div class="container">
        <a href="/tambahsiswa" class="btn btn-success">Tambah + </a>
        <br>

        {{-- Search --}}
        <div class="row g-3 align-items-center mt-2 mb-1">
          <div class="col-auto">
          <form action="/siswa" method="get">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
          </form>
          </div>
        </div>

        <div class="row">
        <table class="table table-striped container">
            <thead> 
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kota</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($data as $index => $item)
                <tr>
                  <th scope="row">{{ $index + $data->firstItem() }}</th>
                  <td>{{ $item->nis }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->tanggal_lahir }}</td>
                  <td>{{ $item->jenis_kelamin }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->kota }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="/tampilkandata/{{ $item->id }}" class="btn btn-info">edit</a>
                    <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}">delete</a>
                  </td>
                </tr>
               @endforeach
            </tbody>

          </div>
        </table>
        {{ $data->links() }}
      </div>

      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      {{-- Sweetalert cdn --}}
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      {{-- Toastr.js--}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
  <script>
    $('.delete').click(function (){
      var dataid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
        title: "Hapus field ini?",
        text: "Anda akan menghapus data siswa dengan nama "+nama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location= "/deletedata/"+dataid+"",
          swal("Data berhasil dihapus!", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus");
        }
      });
    }); 
  </script>

  <script>
    @if (Session::has('succes'))
      toastr.successs("{{ Session::get('succes') }}");
    @endif
  </script>
</html>