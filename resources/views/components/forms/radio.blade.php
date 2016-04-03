<div class="radio">
  <label for="{{ $attribute }}">
    <input type="radio" name="{{ $attribute }}" value="{{ old($attribute, 1) }}" {{ $isChecked : 'checked' : '' }}>
    {{ $label }}
  </label>
</div>
