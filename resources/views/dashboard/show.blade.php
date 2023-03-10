@extends('layouts.main')



@section('main')
  <div class="row">
    <div class="col-sm-12 col-md-6 offset-3">
        <div class="card my-2">
          <div class="card-header">
            <h5 class="card-title">Nota Lengkap</h5>
            <div class="card-tools">
              <a href="{{route('nota.pdf', ['nota' => $nota->id])}}" class="btn btn-sm btn-danger"> <i class="bi bi-printer-fill"></i> Cetak</a>
            </div>
          </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-3 text-right"><b>Nama :</b></div>
                    <div class="col-9">{{$nota->pelanggan->nama}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><b>Nomor :</b></div>
                    <div class="col-9">{{$nota->pelanggan->nomor}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><b>Alamat :</b></div>
                    <div class="col-9">{{$nota->pelanggan->alamat}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><b>Jenis Kelamin :</b></div>
                    <div class="col-9">{{$nota->pelanggan->jenis_kelamin}}</div>
                </div>

                <div class="mt-5">
                    <table class="table table-sm">
                        <thead>
                          <tr>
                            <th>Barang</th>
                            <th>Garansi</th>
                            <th style="width: 40px">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$nota->nama_barang}}</td>
                                <td>{{$nota->notaDetail->label_garansi ?? "Belum Dibuat"}}</td>
                                <td>{{$nota->status}}</td>
                            </tr>
                        </tbody>
                    </table>


                    <p><b>Kerusakan :</b></p>
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                          <h5 class="card-title">{{$nota->keterangan}}</h5>
                          <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-link">#E</a>
                            <a href="#" class="btn btn-tool">
                                <i class="bi bi-exclamation-triangle text-warning"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                      <p><b>Total Bayar</b> : @if(!empty($nota->notaDetail->pemasukan)) @currency($nota->notaDetail->pemasukan) @else 0 @endif</p>
                </div>


            </div>

            <div class="card-footer">
                <h6><b>Dibuat : </b>{{$nota->created_at->format(" D, d M Y")}}</h6>
            </div>
        </div>
    </div>
  </div>
@endsection