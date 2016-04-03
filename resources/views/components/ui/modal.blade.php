<div class="modal {{ $modifier or '' }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ $title }}</h4>
      </div>
      <div class="modal-body">
        {{ $text }}
      </div>
      @if ($close || $save)
      <div class="modal-footer">
        @if ($close)
        <button type="button" class="btn {{ $close['modifier'] or 'btn-default pull-left' }}" data-dismiss="modal">{{ $close['label'] }}</button>
        @endif
        @if ($save)
        <button type="button" class="btn {{ $save['modifier'] or 'btn-primary' }}">{{ $save['label'] }}</button>
        @endif
      </div>
      @endif
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
