@extends('layouts.main')

@section('judul_halaman', 'DASHBOARD')
@section('top-main')
<div class="row bg-white shadow-sm mb-2 p-1">
  <div class="cold-sm-12 col-md-12">
    <form action="{{route('workit.dashboard')}}" method="get">
      <label>Bulan :</label>
        <div class="input-group col-md-2">
          <select class="form-control" name="bulan_filter">
            <option value="all">Semua</option>
          @for ($i = 0; $i < 12; $i++)
              <option value="{{$i+1}}">{{$bulan[$i]}}</option>
          @endfor
          </select>
          <button type="submit" class="btn btn-secondary">Filter</button>
        </div>
    
    </form>
  </div>
</div>
 <!-- Small boxes (Stat box) -->
 <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{count($pelanggans)}}</h3>

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
          <h3>{{count($notas)}}</h3>

          <p>Nota</p>
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
          <h3>@currency($total_keuntungan)</h3>

          <p>Keuntungan</p>
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
          <h3>@currency($total_pengeluaran)</h3>

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
          <h4 class="card-title">
            Daftar Nota
          </h4>
          <div class="card-tools">
            <a href="/nota/excel" class="btn btn-sm btn-success"><i class="bi bi-filetype-xlsx"></i> Elsx</a>
          </div>
        </div>
        <div class="card-body">

          
          <table class="table table-sm" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Barang</th>
                <th width="230">Nota</th>
                <th>Waktu</th>
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
                <td>{{$item->created_at->format('d-m-Y')}}</td>
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
              
                <td>
                  <div class="btn-group">
                    <a href="{{route('nota.edit', ['notum' => $item->id])}}" class="btn btn-sm btn-info">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <a href="{{route('nota.show', ['notum' => $item->id])}}" class="btn btn-sm btn-secondary">
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


{{-- @push('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
  </script>
@endpush --}}

