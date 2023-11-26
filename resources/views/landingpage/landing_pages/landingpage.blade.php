@extends('landingpage.landing_layouts.landing_index')
@section('title', 'LandingPage')
@section('content')

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Poppins-Regular', sans-serif;
        background: linear-gradient(-135deg, #c850c0, #4158d0);
    }

    .container {
        text-align: center;
        color: #fff; /* White text color */
    }

    header h1 {
        color: #fff; /* White text color */
    }

    section p.description {
        color: #fff; /* White text color */
        line-height: 1.6;
    }

    .features ul {
        list-style-type: none;
        padding: 0;
    }

    .features li {
        margin-bottom: 8px;
    }

    .role-description {
        color: #fff; /* White text color */
        margin-top: 20px;
        line-height: 1.6;
    }

    .buttons {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        text-decoration: none;
        color: #fff;
        background-color: #3498db; /* Button color */
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #2980b9; /* Button color on hover */
    }

    .btn-span {
        font-weight: bold;
    }
</style>
<title>@yield('title')</title>

<div class="container">

    <header>
        <h1>School Scheduling</h1>
    </header>

    <section>
        <p class="description">Welcome to our School Scheduling system, designed to streamline and simplify the scheduling process for administrators, teachers, and students. Our platform offers a comprehensive solution to manage classes, assignments, and events efficiently.</p>

        <div class="features">
            <p>Key Features:</p>
            <ul>
                <li>Effortless class scheduling</li>
                <li>Assignment tracking and management</li>
                <li>Event coordination and planning</li>
                <!-- Add more features as needed -->
            </ul>
        </div>

        <p class="role-description">Experience the convenience of our platform tailored to meet the unique needs of administrators, teachers, and students. Select your role below to get started:</p>

        <div class="buttons">
            <a href="{{ route('login')}}" class="bn31">
                <span class="bn31span">Admin</span>
            </a>
            <a href="/teacherID" class="bn31">
                <span class="bn31span">Teacher</span>
            </a>
            <a href="/studentID" class="bn31">
                <span class="bn31span">Student</span>
            </a>
        </div>
    </section>

</div>

@endsection
