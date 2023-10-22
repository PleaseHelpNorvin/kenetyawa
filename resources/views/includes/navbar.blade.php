{{-- <p><a href="">logout</a></p> --}}
<div class="header">
    <div class="side-nav">
        <div class="user">
            <img src="{!! asset('images/'.auth()->user()->image) !!}" width="25" height="35" class="user-img">
            <div>
                <h2>test1</h2>
                <p>test@test<p>
            </div>
            <img src="{{ asset('assets/sidenav-img/images/star.png')}}" class="star-img">
        </div>
        <ul>
            <li><img src="{{ asset('assets/sidenav-img/images/rewards.png')}}"><a href="{{ route('homeview')}}" class="nav-link px-2 text-muted"><p>Home<p></a><li>
            <li><img src="{{ asset('assets/sidenav-img/images/dashboard.png')}}"><a href="{{ route('dashboardview')}}" class="nav-link px-2 text-muted"><p>Dashboard<p></a></li>
            <li><img src="{{ asset('assets/sidenav-img/images/dashboard.png')}}"><a href="{{ route('profileview')}}" class="nav-link px-2 text-muted"><p>Profile<p></a></li>
            <li><img src="{{ asset('assets/sidenav-img/images/setting.png')}}"><p>settings</p></li>
            <li><img src="{{ asset('assets/sidenav-img/images/dashboard.png')}}"><p>test2</p></li>
            <li><img src="{{ asset('assets/sidenav-img/images/dashboard.png')}}"><p>test3</p></li>
            <li><img src="{{ asset('assets/sidenav-img/images/dashboard.png')}}"><p>test4</p></li>
            <li><img src="{{ asset('assets/sidenav-img/images/dashboard.png')}}"><p>test5</p></li>
        </ul>
        <ul>
            <li><img src="{{ asset('assets/sidenav-img/images/logout.png')}}"><a href="{{ route('logout')}}" class="nav-link px-2 text-muted"><p>Logout<p></a></li>
        </ul>
        <div class="animation start-home"></div>
    </div>
</div>