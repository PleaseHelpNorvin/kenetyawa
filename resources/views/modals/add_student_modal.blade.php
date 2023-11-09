<div class="modal" id="myAddStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Faculty</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action= "{{ route('add.student') }}" method="POST">
                    @csrf

                    {{-- <p>test</p> --}}
                    <div class="form-group">
                        <label for="inputStudentNo">Student No </label>
                        <input type="text" name="student_no" class="form-control" id="inputStudentNo"
                            placeholder="Enter Student number">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" name="student_name" class="form-control" id="inputName"
                            placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="inputBlock">Block</label>
                        <input type="text" name="student_block" class="form-control" id="inputBlock"
                            placeholder="Enter Block">
                    </div>
                    <div class="form-group">
                        <label for="inputCourse">Course</label>
                        <input type="text" name="student_course" class="form-control" id="inputCourse"
                            placeholder="Enter Course">
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Contact No	</label>
                        <input type="text" name="student_contact_no" class="form-control" id="inputContact"
                            placeholder="Enter contact number">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="student_email" class="form-control" id="inputEmail"
                            placeholder="Enter Email">
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
