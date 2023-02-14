@extends('layouts.main')


@section('main')
    
<div class="card p-3">
    <div class="card-header border-0">
      <h3 class="card-title">DAFTAR PENGELUARAN</h3>
      <div class="card-tools">
        <a href="/pengeluaran/export" class="btn btn-success btn-sm">
          <i class="bi bi-filetype-xlsx"></i> Xlsx
        </a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">

     
        <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">PENGELUARAN</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($notaDetails as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $item->nota->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->nota->nama_barang }}</td>
                    <td>{{ $item->nota->keterangan }}</td>
                    <td>@currency($item->pengeluaran)</td>
                </tr>
                @empty
                <tr>
                  <td colspan="5"><h3 class="text-muted text-center">PENGELUARAN BELUM ADA</h3></td>
                </tr>
                @endforelse
                <tr class="bg-secondary">
                    <td colspan="4" align="left">Total Pengeluaran</td>
                    <td>@currency($total_pengeluaran)</td>
                </tr>
            </tbody>
          </table>
        
        
    </div>
 
  </div>
  <!-- /.card -->
@endsection