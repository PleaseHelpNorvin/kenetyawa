@extends('admin.layouts.index')
@section('title', 'Student Schedule ')

@section('content')
<style>
    /* Your existing styles */
    .navbar {
      margin-bottom: 20px;
    }

    .nav-content {
      display: none;
    }
</style>

<div class="container mt-3">

  <!-- Navigation Links -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('scheduleview',['teacherID' => 'null'])}}" class="nav-link">Teacher Schedule</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('studentschedule')}}" class="nav-link">Student Schedule</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Dropdown for Selecting Teacher -->
  <!-- <div class="dropdown"> -->
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Select teacher
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      @foreach ($selectTeacher as $teacher)
        <a class="dropdown-item" href="{{ route('scheduleview',['teacherID' => $teacher->id])}}">{{$teacher->name}}</a>
      @endforeach
    </div>
  <!-- </div> -->

  <!-- Button to Add Teacher Schedule -->
  <a href="{{ route('addteacherschedule') }}" class="btn btn-primary">Add Teacher Schedule</a>

  <!-- Navbar for Days of the Week -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#sunday" onclick="showContent('sunday')">Sunday</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#monday" onclick="showContent('monday')">Monday</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tuesday" onclick="showContent('tuesday')">Tuesday</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#wednesday" onclick="showContent('wednesday')">Wednesday</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#thursday" onclick="showContent('thursday')">Thursday</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#friday" onclick="showContent('friday')">Friday</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#saturday" onclick="showContent('saturday')">Saturday</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Content for Each Day -->


  <!-- Sunday -->
  <div id="sunday-content" class="nav-content">
    <!-- Your table and content for Sunday -->
    <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Sunday')
          <tr>
              <td>{{ $selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
         <!-- <p>No schedule inputted</p>  -->
          @endforelse
      </tbody>
    </table>
  </div>

<!-- MONDAY -->
  <div id="monday-content" class="nav-content">
    <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Monday')
          <tr>
              <td>{{ $selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
           <!-- <p>No schedule inputted</p> -->
          @endforelse
         
      </tbody>
    </table>
  </div>




  <!-- tuesday -->
  <div id="tuesday-content" class="nav-content">
  <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Tuesday')
          <tr>
              <td>{{ $selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
          {{-- <p>No schedule inputted</p> --}}
          @endforelse
         
      </tbody>
    </table>
  </div>




<!-- wednesday -->
  <div id="wednesday-content" class="nav-content">
  <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Wednesday')
          <tr>
              <td>{{$selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
          {{-- <p>No schedule inputted</p> --}}
          @endforelse
         
      </tbody>
    </table>
  </div>


  <!-- thursday -->
  <div id="thursday-content" class="nav-content">
  <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Thursday')
          <tr>
              <td>{{ $selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
          {{-- <p>No schedule inputted</p> --}}
          @endforelse
         
      </tbody>
    </table>
  </div>
  <!-- friday -->
  <div id="friday-content" class="nav-content">
  <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Friday')
          <tr>
              <td>{{ $selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
          {{-- <p>No schedule inputted</p> --}}
          @endforelse
         
      </tbody>
    </table>
  </div>
  <!-- saturday -->
  <div id="saturday-content" class="nav-content">
  <table class="table table-striped teacherschedule" data-block="" data-batch="">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Room</th>
              <th>Day</th>
              <th>Time</th>
              <th>Year</th>
              <th>Semester</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($teacherSchedules as $sched)
          @if($sched->day == 'Saturday')
          <tr>
              <td>{{ $selectSubject->subjectname }}</td>
              <td>{{$selectRoom->roomcode}}</td>
              <td>{{$sched->day}}</td>
              <td>{{$sched->time_from}}-{{$sched->time_to}}</td>
              <td>{{$sched->year}}</td>
              <td>{{$sched->semester}}</td>
              <td>
                  <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          @endif
          @empty
          {{-- <p>No schedule inputted</p> --}}
          @endforelse
         
      </tbody>
    </table>
  </div>

  <script>
    function showContent(day) {
      // Hide all content sections
      var allContent = document.getElementsByClassName('nav-content');
      for (var i = 0; i < allContent.length; i++) {
        allContent[i].style.display = 'none';
      }

      // Show the selected content section
      var selectedContent = document.getElementById(day + '-content');
      if (selectedContent) {
        selectedContent.style.display = 'block';
      }
    }
  </script>

</div>

@endsection
