<div class="nav-tabs-custom">
  <ul class="nav nav-tabs {{ $tabModifiers or '' }}">
    @foreach ($tabs as $index => $tab)
    @if ($index === 0)
    <li class="active {{ $tab['modifiers'] or '' }}">
      <a href="#{{ $tab['id'] or $index }}" data-toggle="tab">{!! $tab['label'] !!}</a>
    </li>
    @elseif (array_key_exists('dropdown', $tab))
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="{{ $tab['dropdown']['url'] }}">
        {!! $tab['label'] !!} <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        @foreach ($tab['dropdown']['items'] as $item)
        @if(array_key_exists('divider', $item))
        <li role="presentation" class="divider"></li>
        @else
        <li role="presentation"><a role="menuitem" tabindex="{{ $item['index'] }}" href="{{ $item['url'] }}">{!! $item['label'] !!}</a></li>
        @endif
        @endforeach
      </ul>
    </li>
    @else
    <li class="{{ $tab['modifiers'] or '' }}">
      <a href="#{{ $tab['id'] or $index }}" data-toggle="tab">{!! $tab['label'] !!}</a>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content">
    @foreach ($tabs as $index => $tab)
    @if ($index === 0)
    <div class="tab-pane active" id="{{ $tab['id'] or $index }}">
      {!! $tab['content'] !!}
    </div><!-- /.tab-pane -->
    @else
    <div class="tab-pane active" id="{{ $tab['id'] or $index }}">
      {!! $tab['content'] !!}
    </div><!-- /.tab-pane -->
    @endif
    @endforeach
  </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
