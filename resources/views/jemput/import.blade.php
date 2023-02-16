@extends('layouts.main')


@section('main')
<h3>import data jemput</h3>
   <div class="row">
      <div class="col-sm-12 col-md-6 p-5 bg-white shadow-LG">
         <form method="post" action="{{url('/jemput/ProsesImport')}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
               <label for="file" class="form-label">Import</label>
               <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{old('file')}}">
               @error('file')
               <div class="text-danger text-sm m-1">{{ $message }}</div>
               @enderror
            </div>

           
             <div>
               <button type="submit" class="btn mt-3 btn-primary">
                   Import
               </button>
           </div>
           </form>
      </div>
   </div>
@endsection