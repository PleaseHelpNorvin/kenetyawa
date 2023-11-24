@extends('admin.layouts.index')
@section('title', 'StudentSchedule ')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <div class="container-fluid">
        <ul class="navbar-nav">
  
                <li class="nav-item">
                    <a href="{{ route('scheduleview',['teacherID' => 'null'])}}" class="nav-link">Teacher Schedule</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">Student Schedule</a>
              </li>
        </ul>
    
    </div>
  </nav>
  
  

<div class="container mt-3">
    
  <a href="{{ route('addteacherschedule') }}" class="btn btn-primary">Add Teacher Schedule</a>

 {{-- <div class="form-group">
      <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              Select Option
          </button>
        
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach ($selectTeacher as $teacher)
              <li><a class="dropdown-item" href="#">{{$teacher->name}}</a></li>
              @endforeach
          </ul>
        
      </div>
 </div> --}}
  
  <div class="table-responsive mt-3">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Teachers</th>
                  <th>Teacher Schedules</th>
              </tr>
          </thead>
          <tbody>                    
              <tr>
                  <td>
                 

                          <ul class="list-group teacher-list">
                              @forelse ($selectTeacher as $teacher)
                              <li class="list-group-item">
                                  <a href="{{ route('scheduleview',['teacherID' => $teacher->id])}}">{{$teacher->name}}</a> 
                              </li>
                              @empty
                              <p>no teacher inputed</p>
                              @endforelse
                          </ul>
                     
                      
                  </td>
                
                  <td>
                     
                      <table class="table table-striped teacherschedule" data-block="" data-batch="">
                          <thead>
                              {{-- @forelse ($teacherSchedules as $sched) --}}
                                  
                              <tr>
                                  <th>Subject</th>
                                  <th>Room</th>
                                  <th>Day</th>
                                  <th>Time</th>
                                  <th>year</th>
                                  <th>semester</th>
                                  <th>Action</th>
                              </tr>
                              {{-- @empty --}}
                                  
                              {{-- @endforelse --}}
                          </thead>
                          <tbody>
                              
                              @forelse ($teacherSchedules as $sched)
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
                              @empty
                              {{-- <p>no sched inputed</p> --}}
                              
                          </tbody>
                      </table>
                   
                  </td>
              </tr>
           
              
          </tbody>
      </table>
      
  </div>
</div>
@endif

@endsection