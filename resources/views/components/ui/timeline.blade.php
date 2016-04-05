<ul class="timeline">
  @foreach ($items as $item)
  @if (array_key_exists('label', $item))
  <!-- timeline time label -->
  <li class="time-label">
    <span class="{{ $item['label']['modifier'] }}">
      {{ $item['label']['date'] }}
    </span>
  </li>
  <!-- /.timeline-label -->
  @else
  <!-- timeline item -->
  <li>
    <i class="fa {{ $item['icon'] }} {{ $item['modifier'] }}"></i>
    <div class="timeline-item">
      <span class="time"><i class="fa fa-clock-o"></i> {{ $item['created_at'] }}</span>
      <h3 class="timeline-header {{ $item['header']['modifier'] }}">{!! $item['header']['title'] !!}</h3>
      @if (array_key_exists('body', $item))
      <div class="timeline-body">
        {!! $item['body'] !!}
      </div>
      @endif
      @if (array_key_exists('footer', $item))
      <div class="timeline-footer">
        @foreach ($item['footer'] as $footerItem)
        <a class="btn {{ $footerItem['modifier'] or '' }}">{{ $footerItem['label'] }}</a>
        @endforeach
      </div>
      @endif
    </div>
  </li>
  <!-- END timeline item -->
  @endif
  @endforeach
  <li>
    <i class="fa fa-clock-o bg-gray"></i>
  </li>
</ul>
