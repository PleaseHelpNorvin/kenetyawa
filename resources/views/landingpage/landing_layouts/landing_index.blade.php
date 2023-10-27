<!DOCTYPE html>
<html lang="en">
<head>
   @include('landingpage.landing_includes.landing_header')
</head>
<body>
   {{-- @include('landingpage.landing_includes.landingnav') --}}
   <div class="content">
      {{-- <div class="container"> --}}
          @yield('content')
      {{-- </div> --}}
  </div>
</body>
</html>