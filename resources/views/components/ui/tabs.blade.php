<div class="nav-tabs-custom">
  <ul class="nav nav-tabs {{ $modifier }}">
    @forelse ($tabs as $index => $tab)
    @if (array_key_exists('dropdown', $tab) && array_key_exists('label', $tab))
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="{{ $tab['dropdown']['url'] }}">
        {!! $tab['label'] !!} <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        @forelse ($tab['dropdown']['items'] as $item)
        @if(array_key_exists('divider', $item))
        <li role="presentation" class="divider"></li>
        @elseif (array_key_exists('label', $item) && array_key_exists('url', $item))
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ $item['url'] }}">{!! $item['label'] !!}</a></li>
        @endif
        @empty
        @endforelse
      </ul>
    </li>
    @elseif (array_key_exists('label', $tab))
    <li class="{{ $index === 0 ? 'active ' : '' }}{{ $tab['modifiers'] or '' }}">
      <a href="#{{ $tab['id'] or 'tab'.$index }}" data-toggle="tab">{!! $tab['label'] !!}</a>
    </li>
    @endif
    @empty
    @endforelse
  </ul>
  <div class="tab-content">
    @forelse ($tabs as $index => $tab)
    @if (array_key_exists('content', $tab))
    <div class="{{ $index === 0 ? 'active ' : '' }}tab-pane" id="{{ $tab['id'] or 'tab'.$index }}">
      {!! $tab['content'] !!}
    </div><!-- /.tab-pane -->
    @endif
    @empty
    @endforelse
  </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
