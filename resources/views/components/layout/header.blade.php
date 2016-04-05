<header class="main-header">
  <!-- Logo -->
  <a href="{{ url('/') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">{!! $miniLogo !!}</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{!! $largeLogo !!}</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  @include('rapidmin::components.nav.top')
</header>
