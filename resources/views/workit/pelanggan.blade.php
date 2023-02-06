@extends('layouts.main')

@section('judul_halaman', 'PELANGGAN')

@section('main')
 
<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR PELANGGAN</h3>
      <div class="card-tools">
        <a href="#" class="btn btn-tool btn-sm">
          <i class="fas fa-download"></i>
        </a>
        <a href="#" class="btn btn-tool btn-sm">
          <i class="fas fa-bars"></i>
        </a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA</th>
                <th scope="col">NOMOR</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($com_pelanggans as $pelanggan)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->nomor }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>
                       <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                       <a href="#" class="btn btn-sm btn-info">Ubah</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        
        
    </div>
  </div>
  <!-- /.card -->




@endsection