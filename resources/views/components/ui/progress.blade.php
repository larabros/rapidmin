<div class="progress {{ $isVertical or '' }}">
  <div class="progress-bar {{ $modifier or 'progress-bar-primary' }} {{ isset($isStriped) ? 'progress-bar-striped' : ''}}" role="progressbar" aria-valuenow="{{ $current }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $max }}" style="width: {{ $current }}%">
    <span class="sr-only">{{ $current }}% Complete (success)</span>
  </div>
</div>
