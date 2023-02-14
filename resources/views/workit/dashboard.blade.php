@extends('layouts.main')

@section('judul_halaman', 'DASHBOARD')
@section('top-main')
<div class="row bg-white shadow-sm mb-2 p-1">
  <div class="cold-sm-12 col-md-12">
    <div class="form-group col-md-2">
      <label>Bulan :</label>
      <select class="form-control">
      @for ($i = 1; $i <= 12; $i++)
          <option value="{{$i}}">{{$i}} Bulan</option>
      @endfor
      </select>
    </div>
  </div>
</div>
 <!-- Small boxes (Stat box) -->
 <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{count($com_pelanggans)}}</h3>

          <p>Pelanggan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{count($com_notas)}}</h3>

          <p>Pelayanan</p>
        </div>
        <div class="icon">
          <i class="ion ion-wrench"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>@currency($com_total_pemasukan)</h3>

          <p>Pemasukan</p>
        </div>
        <div class="icon">
          <i class="ion ion-arrow-down-a"></i>
        </div>
       
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>@currency($com_total_pengeluran)</h3>

          <p>Pengeluaran</p>
        </div>
        <div class="icon">
          <i class="ion ion-arrow-up-a"></i>
        </div>
       
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->



  <div class="row">
    <div class="col-sm-12 col-md-9">
      {{-- card panel nota --}}
      <div class="card">
        <div class="card-header ">
          <h4 class="card-title"><b>Untung :</b> @currency($com_total_pemasukan - $com_total_pengeluran)</h4>
          <div class="card-tools">
            <a href="/nota/excel" class="btn btn-sm btn-success"><i class="bi bi-filetype-xlsx"></i> Elsx</a>
          </div>
        </div>
        <div class="card-body">

          @if(session()->has('pesan'))
          <div class="alert alert-success m3" role="alert">
             {{session()->get('pesan')}}
          </div>
          @endif
          <table class="table table-sm">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Barang</th>
                <th>Nota</th>
                <th>Tanggal</th>
                <th>Garansi</th>
                <th style="width: 40px">Aksi</th>
                <th style="width: 40px">Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($notas as $item)
              @php
              if($item->jenis == "Leptop"){
                $type = "danger";

              }
              elseif($item->jenis == "Hp"){
                $type = "warning";

              }elseif($item->jenis == "Bimbel"){
                $type = "success";
              }
                else {
                  $type = "primary";
                } 
              
              @endphp
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  <span class="badge bg-{{$type}}">
                    {{$item->nama_barang}}
                  </span>
                </td>
                <td>
                  <b style="font-size:14px">{{$item->pelanggan->nama}}</b>
                  <span style="display: block; font-size: 13px">
                    {{$item->keterangan}}
                    </span>
                </td>
                <td>{{$item->created_at->diffForHumans() }}</td>
                <td>{{$item->notaDetail->label_garansi  ?? "-"}} Bulan</td>
              
                <td>
                  <div class="btn-group">
                    <a href="{{route('nota.show', ['notum' => $item->id])}}" class="btn btn-sm btn-info">
                      <i class="ion ion-eye"></i>
                    </a>
                    <a href="{{route('dashboard.input.bayar', ['id' => $item->id])}}" class="btn btn-sm btn-warning">
                      <i class="bi bi-currency-exchange"></i>
                    </a>
                    <form method="post" action="{{route('nota.destroy',['notum' => $item->id])}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda Akan menghapus Nota {{$item->nama_barang}} - {{$item->pelanggan->nama}}')">
                        <i class="bi bi-clipboard-x-fill"></i>
                      </button>
                    </form>
                   
                  </div>
                </td>
                <td align="center">
                  @if ($item->status == "BS")
                  <i class="bi bi-circle text-danger"></i>
                  @else
                  <i class="bi bi-check-circle-fill text-success"></i>
                  @endif
                </td>
              </tr>
              
              @empty
                  <tr>
                    <td colspan="5">Kosong</td>
                  </tr>
              @endforelse
            </tbody>
          </table>

          {!! $notas->links() !!}
        
        </div>
        <div class="card-footer">
          <b>Ket :</b>
          <ul>
            <li>Merah(Leptop)</li>
            <li>Kuning(Hp)</li>
            <li>Hijau(Bimbel)</li>
            <li>Biru(Printer)</li>
          </ul>
        </div>
      </div>
      {{-- ./ card panel nota --}}
    </div>
    <div class="col-sm-12 col-md-3">
       <!-- general form elements disabled -->
       <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Log Aktif</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($logs as $item)
                <small>
                  <b class="text-danger fw-bold d-block">{{$item->created_at->diffForHumans()}}</b>
                  {{$item->keterangan}}
                </small><hr>
            @endforeach
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- general form elements disabled -->
    </div>
  </div>
@endsection

