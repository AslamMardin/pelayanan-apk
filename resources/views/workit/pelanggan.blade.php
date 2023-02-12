@extends('layouts.main')


@section('main')
@if(session()->has('pesan'))
<div class="alert alert-success m3" role="alert">
   {{session()->get('pesan')}}
</div>
@endif


<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR PELANGGAN</h3>
      <div class="card-tools">
        <a href="{{route('pelanggan.create')}}" class="btn btn-success btn-sm">
          <i class="fas fa-user-plus"></i> Tambah
        </a>
        
        <a href="/pelanggan/sampah" class="btn btn-sm btn-danger">
          Terhapus <span class="badge bg-warning"> {{$pelangganTrashed}} </span>
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
                @foreach ($com_pelanggans as $pelanggan)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->nomor }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->jenis_kelamin }}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <form method="post" action="{{route('pelanggan.destroy', ['pelanggan' => $pelanggan->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Anda yakin ingin hapus {{ $pelanggan->nama  }} ?')" class="btn btn-sm btn-danger d-inline">Hapus</button>
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