<div class="checkbox">
  <label for={{ $attribute }}>
    <input type="checkbox" name="{{ $attribute }}" value="{{ old($attribute, 1) }}" {{ isset($isChecked) ? 'checked' : '' }}>
    {{ $label or '' }}
  </label>
</div>
