@extends('layout.admin')
  @push('css')
    {{-- cdn bootstrap.css--}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  {{-- Toastr.css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  @endpush

@section('konten')
<div class="content-wrapper justify-content-center">
  <section class="content">
    <div class="container-fluid">
        <div class="row mb-1">
        <div class="col-sm-12">
          <h2 class="text-center mt-3">Data Kota</h2>
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="container">
            <a href="/tambahkota" class="btn btn-success mt-3">Tambah + </a>

            <br>
        
            {{-- Search --}}
            <div class="row g-3 align-items-center mt-2 mb-1">
              <div class="col-auto">
              <form action="/kota" method="get">
                <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
              </form>
              </div>
            </div>
        
            <div class="row">
              @if ($message = Session::get('succes')) 
              <div class="alert alert-success" role="alert">
                 {{ $message }}
              </div>
              @endif
            <table class="table table-striped container">
                <thead> 
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index => $item)
                    <tr>
                      <th scope="row">{{ $item->id }}</th>
                      <td>{{ $item->kota }}</td>
                      <td>
                        <a href="/tampilkankota/{{ $item->id }}" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>

                        <a href="/deletekota/{{ $item->id }}" class="btn btn-danger delete" data-id="{{ $item->nis }}" data-nama="{{ $item->nama }}"><i class="fa-solid fa-trash"></a>
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