@extends('layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endpush



@section('main')

<div class="card p-3">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR KEBUTUHAN</h3>
      <div class="card-tools">
        <a href="/pelanggan/export" class="btn btn-success btn-sm">
          <i class="bi bi-filetype-xlsx"></i> Xlsx
        </a>
        <a href="{{route('kebutuhan.create')}}" class="btn btn-info btn-sm">
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
                <th scope="col">BARANG DIPERLUKAN</th>
                <th scope="col">HARGA</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($kebutuhans as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>@currency($item->harga)</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <form method="post" action="{{route('kebutuhan.destroy', ['kebutuhan' => $item->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Anda yakin ingin hapus {{ $item->barang  }} ?')" class="btn btn-sm btn-danger d-inline">Hapus</button>
                      </form>
                       
                       <a href="{{route('kebutuhan.edit', ['kebutuhan' => $item->id])}}" class="btn btn-sm btn-info">Ubah</a>
                      </div>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5"><h3 class="text-muted text-center">DATA BELUM ADA</h3></td>
                </tr>
                @endforelse
                <tr class="bg-secondary">
                  <td colspan="3" align="left">Total</td>
                  <td colspan="2">@currency($total_harga)</td>
              </tr>
            </tbody>
          </table>
        
        
    </div>
  </div>
  <!-- /.card -->




@endsection
