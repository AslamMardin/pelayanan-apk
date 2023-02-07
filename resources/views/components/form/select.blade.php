<div>
  <label for="{{$name}}" class="form-label">{{$caption}}</label>
  <select class="custom-select form-control-border border-width-2 @error($name) is-invalid @enderror" value="{{old($name)}}" name="{{$name}}" id="{{$name}}">
    <option value="#">Pilih Item..</option>
    @foreach($data as $d)
    <option {{$attributes}} value="{{$d}}">{{$d}}</option>
    @endforeach
  </select>
  @error($name)
        <div class="text-danger text-sm m-1">{{ $message }}</div>
    @enderror
</div>