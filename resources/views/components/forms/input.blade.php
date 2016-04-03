@if(isset($label))
<label for="{{ $attribute }}">{{ $label }}</label>
@endif
<input type="{{ $type or 'text' }}" class="form-control {{ $modifier or '' }}" name="{{ $attribute }}" placeholder="{{ $placeholder or '' }}" value="{{ old($attribute) }}">
@if(isset($helpText))
<p class="help-block">{{ $helpText }}</p>
@endif
