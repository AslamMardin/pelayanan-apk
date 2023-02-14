@extends('layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endpush



@section('main')
@if(session()->has('pesan'))
<div class="alert alert-success m3" role="alert">
   {{session()->get('pesan')}}
</div>
@endif



<div class="card p-3">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR PELANGGAN</h3>
      <div class="card-tools">
        <a href="/pelanggan/export" class="btn btn-success btn-sm">
          <i class="bi bi-filetype-xlsx"></i> Xlsx
        </a>
        <a href="{{route('pelanggan.create')}}" class="btn btn-info btn-sm">
          <i class="fas fa-user-plus"></i> Tambah
        </a>
        
        <a href="/pelanggan/sampah" class="btn btn-sm btn-danger">
          Terhapus <span class="badge bg-warning"> {{$pelangganTrashed}} </span>
        </a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">

     
        <table class="table table-hover" id="myTable">
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
                @forelse ($com_pelanggans as $pelanggan)
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
                @empty
                <tr>
                  <td colspan="5"><h3 class="text-muted text-center">DATA PELANGGAN BELUM ADA</h3></td>
                </tr>
                @endforelse
            </tbody>
          </table>
        
        
    </div>
  </div>
  <!-- /.card -->




@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
  </script>
@endpush