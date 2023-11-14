@foreach ($data as $teacher)
<div class="modal" id="EditModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel{{ $teacher->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel{{ $teacher->id }}">Edit Faculty Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teacherlist.update', $teacher->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="inputIdNo">ID no</label>
                        <input type="text" name="id_no" class="form-control" id="inputIdNo"
                            placeholder="Enter ID no" value="{{ $teacher->id_no }}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" name="faculty_name" class="form-control" id="inputName"
                            placeholder="Enter Name" value="{{ $teacher->name }}">
                    </div>
                    <div class="form-group">
                        <label for="inputCourse">Course</label>
                        <input type="text" name="faculty_course" class="form-control" id="inputCourse"
                            placeholder="Enter Course" value="{{ $teacher->course }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="faculty_email" class="form-control" id="inputEmail"
                            placeholder="Enter Email" value="{{ $teacher->email }}">
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endforeach

