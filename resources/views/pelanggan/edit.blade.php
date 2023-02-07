@extends('layouts.main')

@section('judul_halaman', 'EDIT PELANGGAN')

@section('main')
   <div class="row">
      <div class="col-sm-12 col-md-6 p-5 bg-white shadow-LG">
         <form method="post" action="{{route('pelanggan.update', ['pelanggan'=> $pelanggan->id])}}">
            @csrf
            @method('PUT')
                <x-input name="nama" caption="Nama" value="{{$pelanggan->nama}}" />
                <x-input name="nomor" caption="No WA/Telpon" value="{{$pelanggan->nomor}}" />
                <x-input name="alamat" caption="Alamat" value="{{$pelanggan->alamat}}" />

                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select class="custom-select form-control-border border-width-2 @error('jk') is-invalid @enderror" value="{{old('jk')}}" name="jk" id="jk">
                      <option value="#">Pilih Item..</option>
                      @foreach($jk as $d)
                      <option @selected($d == $pelanggan->jenis_kelamin || old('jk')) value="{{$d}}">{{$d}}</option>
                      @endforeach
                    </select>
                    @error('jk')
                          <div class="text-danger text-sm m-1">{{ $message }}</div>
                      @enderror

                  <x-button class="btn-danger mt-3">
                     Ubah
                  </x-button>
           </form>
      </div>
   </div>
@endsection