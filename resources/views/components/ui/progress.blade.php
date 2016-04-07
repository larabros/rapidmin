<div class="progress {{ $isVertical ? 'vertical' : '' }} {{ $modifier }}">
  <div class="progress-bar {{ $barModifier }} {{ $isStriped ? 'progress-bar-striped' : ''}}" role="progressbar" aria-valuenow="{{ $current }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $max }}" style="width: {{ $current }}%">
    <span class="sr-only">{{ $current }}% Complete (success)</span>
  </div>
</div>
