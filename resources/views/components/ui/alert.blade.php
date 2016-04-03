<div class="alert {{ $modifier or 'alert-info'}} {{ isset($isDismissable) ? 'alert-dismissable' : '' }}">
  @if(isset($isDismissable))
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  @endif
  <h4><i class="icon fa fa-ban"></i> {{ $title }}</h4>
  {{ $text }}
</div>
