<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>

<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/navbar.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/layouts.css') !!}">
<script src="{!! asset('assets/js/navbar.js') !!}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

{{-- bootstrap/modal library --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{!! asset('assets/calendar/css/bootstrap.min.css')!!}">
<!-- Style -->
<link rel="stylesheet" href="{!! asset('assets/calendar/css/style.css')!!}">
<!-- Scripts -->
<script src="{!! asset('assets/calendar/js/jquery-3.3.1.min.js')!!}"></script>
<script src="{!! asset('assets/calendar/js/popper.min.js')!!}"></script>
<script src="{!! asset('assets/calendar/js/bootstrap.min.js')!!}"></script>
<script src="{!! asset('assets/calendar/fullcalendar/packages/core/main.js')!!}"></script>
<script src="{!! asset('assets/calendar/fullcalendar/packages/interaction/main.js')!!}"></script>
<script src="{!! asset('assets/calendar/fullcalendar/packages/daygrid/main.js')!!}"></script>

{{-- faculty list/subject list library --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

{{-- font awewome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

{{-- side-menus --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

{{-- jquery ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- calendar --}}
<link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

    <title>Login</title>
</head>
<body>

    
          
              
                @yield('content')
           
      
       
</body>
</html>
