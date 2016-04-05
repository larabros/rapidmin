<label for="{{ $attribute }}">{{ $label }}</label>
<select class="form-control" {{ isset($isMultiselect) ? 'multiple' : '' }} name="{{ $attribute }}">
  @foreach($options as $value => $option)
  <option value="{{ $value }}">{{ $option }}</option>
  @endforeach
</select>
