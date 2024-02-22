@extends('layout.admin')
  @push('css')
    {{-- cdn bootstrap.css--}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  {{-- Toastr.css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  @endpush

@section('konten')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
        <div class="row mb-1">
        <div class="col-sm-12">
          <h2 class="text-center mt-3">Data Siswa</h2>
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="container">
            <a href="/tambahsiswa" class="btn btn-success mt-3">Tambah + </a>
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
                  @foreach ($data as $index => $item)
                    <tr>
                      <th scope="row">{{ $item->id }}</th>
                      <td>{{ $item->nis }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->tanggal_lahir }}</td>
                      <td>{{ $item->jenis_kelamin }}</td>
                      <td>{{ $item->alamat }}</td>
                      <td>{{ $item->kota->kota ?? '-' }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                        <a href="/tampilkandata/{{ $item->id }}" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>

                        <a href="/deletedata/{{ $item->id }}" class="btn btn-danger delete" data-id="{{ $item->nis }}" data-nama="{{ $item->nama }}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
        
              </div>
            </table>
            {{ $data->links() }}
          </div>
        </div><!-- /.col -->
        </div><!-- /.row -->
      </div> <!-- /.container-fluid -->
    </div>
  </section><!-- /.content-header -->
</div>
@endsection

@push('scripts')
    {{-- Jquery SweetAlert --}}
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>  
    {{-- Sweetalert cdn --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    {{-- Toastr.js--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    {{-- Jquery Toaster --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script> --}}

    <script> //SweetAlert Delete
      $('.delete').click(function (){
        var nis = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
          title: "Anda yakin menghapus field ini?",
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

    <script> //Toastr
      @if (Session::has('succes'))
        toastr.successs("{{ Session::get('succes') }}");
      @endif
    </script>
@endpush