<div id="{{ $id }}" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($items as $index => $item)
    @if ($index === 0)
    <li data-target="#{{ $id }}" data-slide-to="{{ $index }}" class="active"></li>
    @else
    <li data-target="#{{ $id }}" data-slide-to="{{ $index }}"></li>
    @endif
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach ($items as $index => $item)
    @if ($index === 0)
    <div class="item active">
      <img src="{{ $item['url'] }}" alt="{{ $item['caption'] or '' }}">
      <div class="carousel-caption">{{ $item['caption'] or '' }}</div>
    </div>
    @else
    <div class="item">
      <img src="{{ $item['url'] }}" alt="{{ $item['caption'] or '' }}">
      <div class="carousel-caption">{{ $item['caption'] or '' }}</div>
    </div>
    @endif
    @endforeach
  </div>
  <a class="left carousel-control" href="#{{ $id }}" data-slide="prev">
    <span class="fa fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#{{ $id }}" data-slide="next">
    <span class="fa fa-angle-right"></span>
  </a>
</div>
