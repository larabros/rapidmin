<div class="chart {{ $modifier }}">
  <div id="{{ $id }}" style="{{ $options['height'] or 'height: 300px;' }}"></div>
</div>


@section('js')
<script>
    $(function () {

        /*
         * Flot Charts
         * -----------
         */

        $.plot("#{{ $id }}", {!! json_encode($data) !!}, {!! json_encode($options) !!});

        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="{{ $id }}-tooltip"></div>').css({
            position: "absolute",
            display: "none",
            opacity: 0.8
        }).appendTo("body");
        $("#{{ $id }}").bind("plothover", function (event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                $("#{{ $id }}-tooltip").html(item.series.label + " of " + x + " = " + y)
                        .css({top: item.pageY + 5, left: item.pageX + 5})
                        .fadeIn(200);
            } else {
                $("#{{ $id }}-tooltip").hide();
            }
        });
    });
</script>
@endsection