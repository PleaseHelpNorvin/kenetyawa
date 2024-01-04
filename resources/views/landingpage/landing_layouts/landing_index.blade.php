<!DOCTYPE html>
<html lang="en">
<head>
    @include('landingpage.landing_includes.landing_header')
    <!-- <style>
        body {
            font-family: 'Poppins-Regular', sans-serif;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff; /* Set text color to white */
            background: url('{{ asset('images/1973816.png') }}') center center no-repeat; /* Set the background image */
            background-size: cover; /* Ensure the background image covers the entire body */
            border-radius: 50%; /* Make the body background circular */
            overflow: hidden; /* Ensure the circular shape is maintained */
        }

        .content {
            text-align: center; /* Center content within the circular background */
        }

        /* Add other styles as needed */
    </style> -->
</head>
<body>

            @yield('content')
     
</body>
</html>
