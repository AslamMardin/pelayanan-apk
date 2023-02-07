@extends('layouts.main')

@section('judul_halaman', 'PELANGGAN')

@section('main')
 
<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR PELANGGAN</h3>
      <div class="card-tools">
        <a href="{{route('pelanggan.create')}}" class="btn btn-tool btn-sm">
          <i class="fas fa-user-plus"></i>
        </a>
        <a href="#" class="btn btn-tool btn-sm">
          <i class="fas fa-bars"></i>
        </a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">

      @if(session()->has('pesan'))
        <x-alert type="success">
          {{session('pesan')}}
        </x-alert>
      @endif
        <table class="table table-hover">
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
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <form method="post" action="{{route('pelanggan.destroy', ['pelanggan' => $pelanggan->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Anda yakin ingin hapus ?')" class="btn btn-sm btn-danger d-inline">Hapus</button>
                      </form>
                       
                       <a href="{{route('pelanggan.edit', ['pelanggan' => $pelanggan->id])}}" class="btn btn-sm btn-info">Ubah</a>
                      </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        
        
    </div>
  </div>
  <!-- /.card -->




@endsection