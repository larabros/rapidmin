<ol class="breadcrumb">
  @foreach ($items as $index => $item)
  @if ($index === (count($items) - 1))
  <li class="active">{!! $item['label'] !!}</li>
  @else
  <li><a href="{{ $item['url'] }}">{!! $item['label'] !!}</a></li>
  @endif
  @endforeach
</ol>
