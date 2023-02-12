@extends('layouts.main')

@section('judul_halaman', 'EDIT PELANGGAN')

@section('main')
   <div class="row">
      <div class="col-sm-12 col-md-6 p-5 bg-white shadow-LG">
         <form method="post" action="{{route('pelanggan.update', ['pelanggan'=> $pelanggan->id])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $pelanggan->nama}}">
               @error('nama')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

            <div class="mb-3">
               <label for="nomor" class="form-label">No Telpon</label>
               <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror" value="{{old('nomor') ?? $pelanggan->nomor}}">
               @error('nomor')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

            <div class="mb-3">
               <label for="alamat" class="form-label">Alamat</label>
               <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat') ?? $pelanggan->alamat}}">
               @error('alamat')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

            <div>
               <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
               <select class="custom-select form-control-border border-width-2 @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                 <option value="#">Pilih Item..</option>
                 <option value="L" @selected((old('jenis_kelamin') ?? $pelanggan->jenis_kelamin) == 'L')>Laki-Laki</option>
                 <option value="P" @selected((old('jenis_kelamin') ?? $pelanggan->jenis_kelamin) == 'P')>Perempuan</option>
               </select>
               @error('jenis_kelamin')
                     <div class="text-danger text-sm m-1">{{ $message }}</div>
                 @enderror
             </div>
           
             <div>
               <button type="submit" class="btn mt-3 btn-primary">
                   Simpan
               </button>
           </div>
           </form>
      </div>
   </div>
@endsection