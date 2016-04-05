@foreach ($columns as $column)
  <th style='{{ $column['style'] or '' }}'>{!! $column['label'] !!}</th>
@endforeach
