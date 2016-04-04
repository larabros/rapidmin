<div id="{{ $id }}" class="carousel slide" data-ride="carousel">
  <h1>Piss off</h1>
  <ol class="carousel-indicators">
    @forelse ($items as $index => $item)
    @if ($index === 0)
    <li data-target="#{{ $id }}" data-slide-to="{{ $index }}" class="active"></li>
    @else
    <li data-target="#{{ $id }}" data-slide-to="{{ $index }}"></li>
    @endif
    @empty
    @endforelse
  </ol>
  <div class="carousel-inner">
    @forelse ($items as $index => $item)
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
    @empty
    @endforelse
  </div>
  <a class="left carousel-control" href="#{{ $id }}" data-slide="prev">
    <span class="fa fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#{{ $id }}" data-slide="next">
    <span class="fa fa-angle-right"></span>
  </a>
</div>
