@extends('mahasiswa.app');

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
            <a href="{{ url('tambah-data') }}" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plush"></i> Tambah Data</a>
            <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mhs as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->fakultas }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>
                                    <form action="{{ url('hapus-data') }}/{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            {{-- <a href="{{ url('hapus-data') }}/{{ $item->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                                            
                                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#Modalubah{{ $item->id }}"><i class="fa fa-edit"></i></a>
                                        </form>
                                        {{-- <a href=""></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  
  <!-- Modal Tambah -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Tambah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('tambah-data') }}" method="post">
              @csrf
              <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="" class="form-control">
                  @error('nama')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Nim</label>
                  <input type="number" name="nim" id="" class="form-control">
                  @error('nim')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Fakultas</label>
                  <input type="text" name="fakultas" id="" class="form-control">
                  @error('fakultas')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Jurusan</label>
                  <input type="text" name="jurusan" id="" class="form-control">
                  @error('jurusan')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="float-right mt-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal Ubah -->
  @foreach ($mhs as $item)

  <div class="modal fade" id="Modalubah{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Modalubah">Modal Ubah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('ubah-data') }}/{{ $item->id }}" method="post">
              @csrf
              <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="" class="form-control" value="{{ $item->nama }}">
              </div>
              <div class="form-group">
                  <label for="">Nim</label>
                  <input type="number" name="nim" id="" class="form-control" value="{{ $item->nim }}">
              </div>
              <div class="form-group">
                  <label for="">Fakultas</label>
                  <input type="text" name="fakultas" id="" class="form-control" value="{{ $item->fakultas }}">
              </div>
              <div class="form-group">
                  <label for="">Jurusan</label>
                  <input type="text" name="jurusan" id="" class="form-control" value="{{ $item->jurusan }}">
              </div>
              <div class="float-right mt-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
      
  @endforeach
@endsection