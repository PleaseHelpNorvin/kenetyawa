<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.header')
</head>
    {{-- @include('css.template_css') --}}
<body>
    
    @include('includes.navbar')
    
    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

</body>
<footer>
    @include('includes.footer')
</footer>

</html>
