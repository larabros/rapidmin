<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>rapidmin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Concatenated and minified styles -->
  <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('rapidmin::components.layout.header', ['miniLogo' => '<b>A</b>LT', 'largeLogo' => '<b>Admin</b>LTE'])
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('rapidmin::components.nav.left')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('rapidmin::components.layout.footer', ['name' => 'Larabros'])

  @include('rapidmin::components.nav.right')
</div>
<!-- ./wrapper -->

<script>
  var AdminLTEOptions = {!! json_encode(config('rapidmin')) !!};
</script>

<!-- Concatenated and minified scripts -->
<script src="{{ asset('js/vendor.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

@section('js')

@show

</body>
</html>
