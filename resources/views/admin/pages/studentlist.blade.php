@extends('admin.layouts.index')
@section('title', 'Student List')
@include('modals.schedule_modal')

@section('content')
<style>
    /* Additional CSS for list styling */
    .student-list .list-group-item.active {
        background-color: black;
        color: white;
    }
    .student-list .list-group-item {
        cursor: pointer;
    }
</style>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Add Schedule
    </button>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#student1">section 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#student2">section 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#student3">section 3</a>
                </li>
                <!-- Add more student links as needed -->
            </ul>
        </div>
    </nav>
    <!-- nav BAR na sa babaw -->
   
    <div class="row">
        <div class="col-md-3">
            <div class="list-group student-list">
                @forelse ($data as $students)

                    <a href="#student1" class="list-group-item list-group-item-action">{{$students->name}}</a>

                @empty
                <p>no data inputed</p>
            @endforelse
                <!-- Add more student list items as needed -->
            </div>
        </div>
     
        <div class="col-md-9">
            <section id="student1" class="content-block">
                <!-- Student 1 content goes here -->
                <h1>Student 1 Information</h1>
                <p>Student 1 details...</p>
            </section>
            <section id="student2" class="content-block">
                <!-- Student 2 content goes here -->
                <h1>Student 2 Information</h1>
                <p>Student 2 details...</p>
            </section>
            <section id="student3" class="content-block">
                <!-- Student 3 content goes here -->
                <h1>Student 3 Information</h1>
                <p>Student 3 details...</p>
            </section>
            <!-- Add more student content blocks as needed -->
        </div>
    </div>
</div>


<script>
    // Add click event listeners to student list items to make them active and show/hide content blocks
    var studentListItems = document.querySelectorAll('.list-group-item');
    var studentContentBlocks = document.querySelectorAll('.content-block');
    studentListItems.forEach(function(item, index) {
        item.addEventListener('click', function() {
            studentListItems.forEach(function(listItem) {
                listItem.classList.remove('active');
            });
            item.classList.add('active');

            studentContentBlocks.forEach(function(block) {
                block.style.display = 'none';
            });
            studentContentBlocks[index].style.display = 'block';
        });
    });
</script>

<script src="{{ asset('assets/calendar/js/main.js') }}"></script>
@endsection