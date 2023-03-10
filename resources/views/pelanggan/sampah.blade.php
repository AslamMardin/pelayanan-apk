@extends('layouts.main')


@section('main')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR PELANGGAN TERHAPUS</h3>
      <div class="card-tools">
       
        <a href="{{route('workit.pelanggan')}}" class="btn btn-secondary btn-sm">
          <i class="bi bi-arrow-90deg-left"></i>
        </a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">

     
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA</th>
                <th scope="col">NOMOR</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">JK</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($pelanggans as $pelanggan)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->nomor }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->jenis_kelamin }}</td>
                    <td>
                    <div class="d-flex">

                        <a href="{{route('pelanggan.restore', ['id' => $pelanggan->id])}}" class="btn btn-sm btn-primary"  onclick="return confirm('ingin mengembalikan pelanggan {{$pelanggan->nama}} ?')"><i class="bi bi-arrow-clockwise"></i></a>
                        <form action="{{route('pelanggan.hapus', ['id' => $pelanggan->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" value="Hapus" onclick="return confirm('ingin menghapus permanent {{$pelanggan->nama}} ?')"  class="btn btn-sm btn-danger ml-1"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        
                    </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center fa-w-19">Data Terhapus Belum ada !</td>
                </tr>
                @endforelse
            </tbody>
          </table>
        
        
    </div>
  </div>
  <!-- /.card -->




@endsection