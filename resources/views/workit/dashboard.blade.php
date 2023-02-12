@extends('layouts.main')

@section('judul_halaman', 'DASHBOARD')
@section('top-main')
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
          <h3>0</h3>

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
          <h3>0</h3>

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
          <h3>0</h3>

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
        <div class="card-header">
          <h4 class="card-title">Nota</h4>
        </div>
        <div class="card-body">
          {{-- mulai nota --}}
           

          <div class="row">
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
            <!-- .col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box m-1 bg-{{$type}}">
                <div class="info-box-content">
                  <div class="row" style="display: flex; justify-content: space-between; font-size: 13px">
                    <small class="text-right">{{$item->created_at->diffForHumans()}}</small>
                    <small class="text-right" style="font-size: 11px">{{$item->created_at->format('d/m/Y')}}</small>
                  </div>
                  <div class="row py-1" style="border-bottom:1px dashed #000;border-top:1px dashed #000">
                    <span class="info-box-text" style="font-size: 12px; font-weight:bold">{{ $item->nama_barang }} - {{$item->keterangan}}</span>
                  </div>
                  <div class="row" style="font-size: 15px;">
                    <small>{{ $item->pelanggan->nama }}</small>
                    
                  </div>
                  <div class="btn-group mt-2" style="display: flex; justify-content: space-between">
                    <a href="#" class="text-white">
                      <i class="ion ion-eye"></i>
                    </a>
                    <a href="{{route('dashboard.input.bayar', ['id' => $item->id])}}" class="text-white">
                      <i class="ion ion-card"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
            @empty
            <h3 class="text-center text-muted">Nota Belum ada!</h3>
            @endforelse
            
          </div>



          {{-- ./ mulai nota --}}
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
                  <b class="text-danger fw-bold d-block">{{$item->created_at->format('Y/m/d H:i:s')}}</b>
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
@section('main')
    
@endsection