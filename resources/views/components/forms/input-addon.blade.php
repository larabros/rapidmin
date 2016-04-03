@if(isset($preLabel))
<span class="input-group-addon">{!! $preLabel !!}</span>
@endif
<input type="{{ $type }}" class="form-control {{ $modifier or '' }}" name="{{ $attribute }}" placeholder="{{ $placeholder or '' }}" value="{{ old($attribute) }}">
@if(isset($postLabel))
<span class="input-group-addon">{!! $postLabel !!}</span>
@endif
