@extends('layouts.main')

@section('judul_halaman', 'DASHBOARD')
@section('top-main')
 <!-- Small boxes (Stat box) -->
 <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>0</h3>

          <p>Pelanggan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
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
          <i class="ion ion-stats-bars"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3 sty>1.000.000</h3>

          <p>Pemasukan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
       
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>20.000.000</h3>

          <p>Pengeluaran</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
       
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
@endsection
@section('main')
    
@endsection