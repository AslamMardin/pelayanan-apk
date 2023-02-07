@extends('layouts.main')

@section('judul_halaman', 'TAMBAH PELANGGAN')

@section('main')
   <div class="row">
      <div class="col-sm-12 col-md-6 p-5 bg-white shadow-LG">
         <form action="{{route('pelanggan.store')}}" method="post">
            @csrf
            @method('post')
                <x-input name="nama" caption="Nama" />
                <x-input name="nomor" caption="No WA/Telpon" />
                <x-input name="alamat" caption="Alamat" />

                <x-form.select name="jk" :data="$jk" caption="Jenis Kelamin" />

                  <x-button class="btn-danger mt-3">
                     Simpan
                  </x-button>
           </form>
      </div>
   </div>
@endsection