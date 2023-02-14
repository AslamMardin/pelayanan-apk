@extends('layouts.main')


@section('main')
   <div class="row">
      <div class="col-sm-12 col-md-4 offset-4 p-5 bg-white shadow-LG">
         <form action="{{route('dashboard.bayar', ['id' => $nota->id])}}" method="post">
            @csrf
            @method('post')

            <div class="mb-3">
                <label for="id_nota" class="form-label">ID NOTA</label>
                <input type="text" name="id_nota" class="form-control @error('id_nota') is-invalid @enderror" value="{{$nota->id}}" readonly>
                <div class="text-danger text-sm m-1">
                    <b>Nota : </b>
                    {{$nota->nama_barang}} - {{$nota->keterangan}}
                </div>
             </div>

            <div class="mb-3">
               <label for="pengeluaran" class="form-label">Harga Pengeluaran Beli Barang </label>
               <input type="text" name="pengeluaran" class="form-control @error('pengeluaran') is-invalid @enderror" value="{{ $nota->notaDetail->pengeluaran ?? old('pengeluaran')}}" id="rupiah1">
               <div class="text-success text-sm m-1" id="labelPengeluaran"></div>
               @error('pengeluaran')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="pemasukan" class="form-label">Total Bayar</label>
               <input type="text" name="pemasukan" class="form-control @error('pemasukan') is-invalid @enderror" value="{{$nota->notaDetail->pemasukan ?? old('pemasukan')}}" id="rupiah2">
               <div class="text-success text-sm m-1" id="labelPemasukan"></div>
               @error('pemasukan')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

            
            
            <div>
               <label for="garansi" class="form-label">Garansi</label>
               <select class="custom-select form-control-border border-width-2 @error('garansi') is-invalid @enderror" name="garansi" id="garansi">
                  <option value="">Pilih Garansi..</option>
                  @for ($i = 1; $i <= 12; $i++)
                  <option @selected(($nota->notaDetail->label_garansi ?? old('garansi')) == $i) value="{{$i}}">{{$i}}</option>
                  @endfor
               </select>
               @error('garansi')
                     <div class="text-danger text-sm m-1">{{ $message }}</div>
                 @enderror
             </div>
           
             <div>
               <button type="submit" class="btn mt-3 btn-primary">
                   Selesai
               </button>
           </div>
       
           </form>
      </div>
   </div>
@endsection


@push('js')
<script type="text/javascript">
		
   var rupiah1 = document.getElementById('rupiah1');
   var labelPengeluaran = document.getElementById('labelPengeluaran');
   var labelPemasukan = document.getElementById('labelPemasukan');
   rupiah1.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      if(this.value == ""){
         labelPengeluaran.innerHTML = "";
      }else {
         labelPengeluaran.innerHTML = "Pengeluran " + formatRupiah(this.value, 'Rp. ');
      }
   });


   var rupiah2 = document.getElementById('rupiah2');
   rupiah2.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      if(this.value == ""){
         labelPemasukan.innerHTML = "";
      }else {
         labelPemasukan.innerHTML = "Pemasukan " + formatRupiah(this.value, 'Rp. ');
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