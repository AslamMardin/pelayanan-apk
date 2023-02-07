<div class="mb-3">
        <label for="{{$name}}" class="form-label">{{$caption}}</label>
        <input type="{{$type}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror" {{$attributes->merge(['value' => old($name)])}}>
        @error($name)
        <div class="text-danger text-sm m-1">{{ $message }}</div>
    @enderror
</div>
