<div class="progress {{ $isVertical ? 'vertical' : '' }} {{ $sizeModifier }}">
  <div class="progress-bar {{ $modifier }} {{ $isStriped ? 'progress-bar-striped' : ''}}" role="progressbar" aria-valuenow="{{ $current }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $max }}" style="width: {{ $current }}%">
    <span class="sr-only">{{ $current }}% Complete (success)</span>
  </div>
</div>
