@extends('layouts.main')

@section('main')
<div class="card">
   <div class="card-header">
      <h5 class="card-title">Setting</h5>
   </div>
   <form action="{{route('pengaturan.update')}}" method="post">
   <div class="card-body">
         @csrf
         @method('PUT')
         <label>Bulan :</label>
           <div class="col-md-6 my-3">
             <select class="form-control" name="bulan">
               <option value="100">Semua</option>
             @for ($i = 0; $i < 12; $i++)
                 <option @selected($bulan_sekarang == ($i+1)) value="{{$i+1}}">{{$bulan[$i]}}</option>
             @endfor
             </select>
            </div>
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-info ">Update</button>
       
       </form>

         </div>
      </div>
@endsection
