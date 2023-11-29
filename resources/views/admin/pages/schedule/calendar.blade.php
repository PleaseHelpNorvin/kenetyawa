@extends('admin.layouts.index')
@section('title', 'Schedule')
@include('modals.schedule_modal')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('scheduleview', ['teacherID' => 'null']) }}" class="nav-link">Teacher Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('studentscheduleview', ['BatchId' => 'null', 'BlockId' => 'null']) }}"
                            class="nav-link">Student Schedule</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="elegant-calencar d-md-flex">
                    <div class="wrap-header d-flex align-items-center">
                        <p id="reset">reset</p>
                        <div id="header" class="p-0">
                            <div class="pre-button d-flex align-items-center justify-content-center"><i
                                    class="fa fa-chevron-left"></i></div>
                            <div class="head-info">
                                <div class="head-day"></div>
                                <div class="head-month"></div>
                            </div>
                            <div class="next-button d-flex align-items-center justify-content-center"><i
                                    class="fa fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="calendar-wrap">
                        <table id="calendar">
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
