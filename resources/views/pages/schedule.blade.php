@extends('layouts.index')
@section('title', 'Home')

@section('content')


    <h2 class="mt-3">Schedule Calendar</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Time</th>
                <th>Event</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>10:00 AM - 12:00 PM</td>
                <td>Event 1</td>
            </tr>
            <tr>
                <td>2:00 PM - 4:00 PM</td>
                <td>Event 2</td>
            </tr>
            <!-- Add more rows for additional events -->
        </tbody>
    </table>
</div>

</body>
</html>

@endsection