@extends('admin.layouts.index')
@section('title', 'Student List')
@include('modals.add_student_modal')

@section('content')
<style>
    /* Additional CSS for list styling */
    .nav-link.active {
        color: blue; /* Change text color to blue */
    }
</style>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myAddStudentModal">
        Add Student
    </button>
    <br><br>
  <form action="">
    <button type="submit" class="btn btn-primary" > Add Batch</button>
  </form>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#student1" id="batch1-link">BATCH 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#student2" id="batch2-link">BATCH 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#student3" id="batch3-link">BATCH 3</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Sub-section navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sub-nav" style="display: none;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#subNavbar"
            aria-controls="subNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="subNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#section1">BLOCK 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section2">BLOCK 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section3">BLOCK 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section3">BLOCK 4</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<script>
    // Add click event listeners to make the links active and change their color
    var batchLinks = document.querySelectorAll('.nav-link');
    var subNav = document.querySelector('.sub-nav');
    batchLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            batchLinks.forEach(function(batchLink) {
                batchLink.classList.remove('active');
            });
            link.classList.add('active');

            // Show/hide the sub-section navigation based on the selected batch
            if (link.id === 'batch1-link') {
                subNav.style.display = 'block';
            } else {
                subNav.style.display = 'none';
            }
        });
    });
</script>

@endsection
