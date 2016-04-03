<label for="{{ $attribute }}">{{ $label }}</label>
<select class="form-control" {{ $isMultiselect or false ? 'multiple' : '' }} name="{{ $attribute }}">
  @foreach($options as $value => $option)
  <option value="{{ $value }}">{{ $option }}</option>
  @endforeach
</select>
