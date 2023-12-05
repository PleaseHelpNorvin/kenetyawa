@extends('admin.layouts.index')
@section('title', 'StudentSchedule ')

@section('content')
    <style>
        /* Your existing styles */
        .navbar {
            margin-bottom: 20px;
        }

        .nav-content {
            display: none;
        }

        .navbar-nav .nav-item .nav-link.active {
            color: blue;
            /* Set the text color to black for the active link */
            /* Additional styles for the active state */
        }
    </style>


    <div class="container mt-3">

        <!-- Navigation Links -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('scheduleviewnav')}}"
                            class="nav-link {{ request()->routeIs('scheduleviewnav*') ? 'active' : '' }}">Event |</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacherscheduleview', ['teacherID' => 'null']) }}" 
                            class="nav-link {{ request()->routeIs('teacherscheduleview*') ? 'active' : '' }}">Teacher Schedule |</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('studentscheduleview', ['BatchId' => 'null' ,'BlockId' => 'null']) }}"
                            class="nav-link {{ request()->routeIs('studentscheduleview') ? 'active' : '' }}">Student Schedule </a>
                  </li>
                </ul>
            </div>
        </nav>
        
        <div class="form-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Select Batch
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($getBtach as $Batch)
                    <a class="dropdown-item select-teacher"
                        href="{{ route('studentscheduleview', ['BatchId' => $Batch->id, 'BlockId' => 'null']) }}">{{ $Batch->batch_name }}</a>
                @endforeach
            </div>

        </div>

        @if ($getBlock)
            <div class="form-group">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Block
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($getBlock as $block)
                        <a class="dropdown-item select-teacher"
                            href="{{ route('studentscheduleview', ['BatchId' => $findBatch->id, 'BlockId' => $block->id]) }}">{{ $block->block_name }}</a>
                    @endforeach
                </div>
            </div>  
        @endif

    @endsection
