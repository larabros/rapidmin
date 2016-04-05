<div class="box">
  <div class="box-header {{ $bordered ? 'with-border' : ''   }}">
    <h3 class="box-title"> {{ $title }} </h3>
    @if ($pagination != null && $pagination['vertical'] == 'top' )
       @include('rapidmin::components.ui.pagination', [ 'horizontal' => $pagination['horizontal'] ]);
    @endif
  </div>
  <!-- /.box-header -->
  <div class="box-body {{ $bordered ? '' : 'no-padding' }}"> <!-- !!!ONE DAY YOU MIGHT WANT TO USE ;) {{ $responsive ? 'table-responsive' : '' }} -->
    <table class="table {{ $modifier or '' }} {{ $bordered ? 'table-bordered' : '' }}">
      <tr>
      @include('rapidmin::components.tables.partials._columns', ['columns' => $table['columns']])
      </tr>
      @foreach ($table['rows'] as $row)
        <tr>
          @foreach($row as $value)
          <td>{!! $value !!}</td>
          @endforeach
        </tr>
      @endforeach
    </table>
  </div>
  <!-- /.box-body -->
  @if ($pagination != null && $pagination['vertical'] == 'bottom' )
    @include('rapidmin::components.ui.pagination', [ 'horizontal' => $pagination['horizontal'] ]);
  @endif
</div>
<!-- /.box -->
