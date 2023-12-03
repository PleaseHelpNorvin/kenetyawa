<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('admin.includes.header')
</head>
    {{-- @include('css.template_css') --}}
<body>
    
    @include('admin.includes.navbar')
    
    <div class="content">
        {{-- <div class="container"> --}}
            @yield('content')
            {{-- Samok kaayu akong gitangtang amawa ka --}}
        {{-- </div> --}}
    </div>

</body>
<footer>
    {{-- @include('admin.includes.footer') --}}
</footer>

</html>
