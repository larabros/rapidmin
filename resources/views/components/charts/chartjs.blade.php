<div class="chart {{ $modifier }}">
  <canvas id="{{ $id }}"></canvas>
</div>


@section('js')
<script>
    $(function () {

        /* ChartJS
         * -------
         */

        // Create the line chart
        var chart = new Chart($("#{{ $id }}").get(0).getContext("2d"));
        chart.{{ $type }}({!! json_encode($data) !!}, {!! json_encode($options) !!});
    });
</script>
@endsection