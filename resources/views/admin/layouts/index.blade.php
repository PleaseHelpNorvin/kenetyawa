<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('admin.includes.header')
</head>
  
<body>
    
    @include('admin.includes.navbar')
    
    <div class="content">
        {{-- <div class="container"> --}}
            @yield('content')
          
        {{-- </div> --}}
    </div>

</body>
<footer>
    {{-- @include('admin.includes.footer') --}}
</footer>

</html>
