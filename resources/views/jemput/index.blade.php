@extends('layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endpush



@section('main')

<div class="card p-3">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR JEMPUT</h3>
      <div class="card-tools">
        <a href="{{route('jemput.import')}}" class="btn btn-success btn-sm">
          <i class="bi bi-filetype-xlsx"></i> Import
        </a>
        <a href="/jemput/export" class="btn btn-success btn-sm">
          <i class="bi bi-filetype-xlsx"></i> Xlsx
        </a>
        <a href="{{route('jemput.create')}}" class="btn btn-info btn-sm">
            <i class="bi bi-clipboard-plus-fill"></i> Tambah
        </a>
        
        
      </div>
    </div>
    <div class="card-body table-responsive p-0">

     
        <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">NAMA</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">BARANG DIJEMPUT</th>
                <th scope="col">TRANSPORTAS</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($jemputs as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->pelanggan->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>@currency($item->transportasi)</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <form method="post" action="{{route('jemput.destroy', ['jemput' => $item->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Anda yakin ingin hapus {{$item->barang}} barangnya {{ $item->pelanggan->nama }} ?')" class="btn btn-sm btn-danger d-inline">Hapus</button>
                      </form>
                       
                       <a href="{{route('jemput.edit', ['jemput' => $item->id])}}" class="btn btn-sm btn-info">Ubah</a>
                      </div>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6"><h3 class="text-muted text-center">DATA BELUM ADA</h3></td>
                </tr>
                @endforelse
                <tr class="bg-secondary">
                  <td colspan="5" align="left">Total</td>
                  <td colspan="2">@currency($total_transportasi)</td>
              </tr>
            </tbody>
          </table>
        
        
    </div>
  </div>
  <!-- /.card -->




@endsection
