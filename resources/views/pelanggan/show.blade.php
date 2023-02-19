@extends('layouts.main')

@section('main')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Pelanggan : {{ ucwords($pelanggan->nama) }}</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Barang</th>
                <th scope="col">Kerusakan</th>
              </tr>
            </thead>
            <tbody>
                @forelse($pelanggan->nota as $item)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->created_at->format('d/m/Y')}}</td>
                <td>{{$item->nama_barang}}</td>
                <td>{{$item->keterangan}}</td>
              </tr>
              @empty 
              <tr><td colspan="4" align="center">History Tidak ada</td></tr>
              @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
