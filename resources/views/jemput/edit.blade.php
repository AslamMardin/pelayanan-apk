@extends('layouts.main')

@section('judul_halaman', 'EDIT JEMPUT')

@section('main')
   <div class="row">
      <div class="col-sm-12 col-md-6 p-5 bg-white shadow-LG">
         <form action="{{route('jemput.update', ['jemput' => $jemput->id])}}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <select class="custom-select form-control-border border-width-2 @error('nama') is-invalid @enderror" name="nama" id="nama">
                  <option value="#">Pilih Nama</option>
                  @foreach($pelanggans as $item)
                  <option value="{{$item->id}}" @selected($jemput->pelanggan_id == $item->id)>{{$item->nama}}</option>
                  @endforeach
                </select>
                @error('nama')
                      <div class="text-danger text-sm m-1">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" autocomplete="off" value="{{old('alamat') ?? $jemput->alamat}}">
                @error('alamat')
                <div class="text-danger text-sm m-1">{{ $message }}</div>
                @enderror
             </div>

            <div class="mb-3">
               <label for="barang" class="form-label">Nama Barang Di Jemput</label>
               <input type="text" name="barang" class="form-control @error('barang') is-invalid @enderror" autocomplete="off" value="{{old('barang') ?? $jemput->barang}}">
               @error('barang')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

            <div class="mb-3">
               <label for="transportasi" class="form-label">Transportasi</label>
               <input type="text" name="transportasi" id="transportasi" class="form-control @error('transportasi') is-invalid @enderror" autocomplete="off" value="{{old('transportasi') ?? $jemput->transportasi}}">
               <div class="text-danger text-sm m-1" id="labelTransportasi"></div>
               @error('transportasi')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

         
             <div>
               <button type="submit" class="btn mt-3 btn-primary">
                   Edit
               </button>
           </div>
       
           </form>
      </div>
   </div>
@endsection

@push('js')
<script type="text/javascript">
		
   var transportasi = document.getElementById('transportasi');
   var labelTransportasi = document.getElementById('labelTransportasi');
   transportasi.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      if(this.value == ""){
         labelTransportasi.innerHTML = "";
      }else {
         labelTransportasi.innerHTML = "Transportasi " + formatRupiah(this.value, 'Rp. ');
      }
   });

   /* Fungsi formatRupiah */
   function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
         separator = sisa ? '.' : '';
         rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
   }
</script>
@endpush