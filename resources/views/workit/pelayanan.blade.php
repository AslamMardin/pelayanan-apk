@extends('layouts.main')


@section('main')



    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-2">
                 <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Nota</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('nota.store')}}">
                    @csrf
                  <div class="card-body">

                   <div class="row">
                    <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <select class="form-control" name="pelanggan_id">
                          <option value="">Pilih Pelanggan</option>
                          @foreach ($com_pelanggans as $pelanggan)
                          <option @selected(old('pelanggan_id') == $pelanggan->id ) value="{{$pelanggan->id}}">{{$pelanggan->nama}}</option>
                          @endforeach
                      </select>
                      @error('pelanggan_id')
             <div class="text-danger text-sm m-1">{{ $message }}</div>
             @enderror
                    </div>
                    <div class="col-sm-12 col-md-6"> 
                      
                      <div class="form-group">
                        <label>Jenis Barang</label>
                        <select class="form-control" name="jenis">
                          <option @selected(old('jenis') == "Leptop") value="Leptop">Leptop</option>
                          <option @selected(old('jenis') == "Hp") value="Hp">HandPhone</option>
                          <option @selected(old('jenis') == "Printer") value="Printer">Printer</option>
                          <option @selected(old('jenis') == "Bimbel") value="Bimbel">Bimbel</option>
                        </select>
                        @error('jenis')
                      <div class="text-danger text-sm m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label>Nama Barang</label>
                       <input type="text" name="nama_barang" class="form-control" value="{{old('nama_barang')}}">
                        @error('nama_barang')
                      <div class="text-danger text-sm m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                   </div>
                      

                  


                    <div class="form-group">
                      <label>Keterangan</label>
                     <input type="text" name="keterangan" class="form-control" value="{{old('keterangan')}}">
                      @error('keterangan')
                    <div class="text-danger text-sm m-1">{{ $message }}</div>
                      @enderror
                  </div>
                    
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Buat Nota</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
              <!-- general form elements -->
            </div>
        </div>
    </div>
@endsection