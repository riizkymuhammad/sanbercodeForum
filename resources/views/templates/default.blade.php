<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Forum Tanya Jawab StuckCoding</title>
  @include('templates.style')
@stack('after-style')
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
@include('templates.navbar')

@include('templates.navmenu')

      <!-- Main Content -->
      <div class="main-content">
          @yield('content')

      </div>
@include('templates.footer')
    </div>
  </div>

@stack('before-script')
@include('templates.script')
@stack('after-script')
</body>
</html>
