@extends('layouts.main')

@section('judul_halaman', 'EDIT KEBUTUHAN')

@section('main')
   <div class="row">
      <div class="col-sm-12 col-md-6 p-5 bg-white shadow-LG">
         <form action="{{route('kebutuhan.update', ['kebutuhan' => $kebutuhan->id])}}" method="post">
            @csrf
            @method('put')

              
            <div class="mb-3">
               <label for="barang" class="form-label">Nama Barang Di Perlukan</label>
               <input type="text" name="barang" class="form-control @error('barang') is-invalid @enderror" autocomplete="off" value="{{old('barang') ?? $kebutuhan->barang}}">
               @error('barang')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

            <div class="mb-3">
               <label for="harga" class="form-label">Harga</label>
               <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" autocomplete="off" value="{{old('harga') ?? $kebutuhan->harga}}">
               <div class="text-danger text-sm m-1" id="labelHarga"></div>
               @error('harga')
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
		
   var harga = document.getElementById('harga');
   var labelHarga = document.getElementById('labelHarga');
   harga.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      if(this.value == ""){
         labelHarga.innerHTML = "";
      }else {
         labelHarga.innerHTML = "Transportasi " + formatRupiah(this.value, 'Rp. ');
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