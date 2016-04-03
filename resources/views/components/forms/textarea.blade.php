<div class="form-group">
  <label for="{{ $attribute }}">{{ $label }}</label>
  <textarea class="form-control" rows="3" name="{{ $attribute }}" placeholder="Enter ..." {{ $isDisabled ? 'disabled' : '' }}>{{ old($attribute) }}</textarea>
</div>
