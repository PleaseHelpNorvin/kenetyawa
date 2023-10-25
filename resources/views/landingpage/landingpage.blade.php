<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    @include('includes.header')
    <style>
        .profile-button a {
  margin-right: 10px; /* Adjust the value as needed to control the spacing */
}

    </style>
</head>
<body>
    
    <div class="topnav">
        <div class="logo">SCHEDULING SYSTEM</div>
        <div class="profile-dropdown">
            <button id="profile-button" class="profile-button">
             <a href="{{ route('login')}}">LogIn</a>
             <a href="{{ route('register')}}">Register</a>
            </button>

        </div>
    </div>
</body>
</html>