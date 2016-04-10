<?php
    $options['data'] = $data;
?>
<div class="chart {{ $modifier }}">
  <div id="{{ $id }}" style="{{ $options['height'] or 'height: 300px;' }}"></div>
</div>


@section('js')
<script>
    $(function () {

        /* Morris
         * ------
         */

        // Create the line chart
        var chart = new Morris.{{ $type }}({!! json_encode($options) !!});
    });
</script>
@endsection