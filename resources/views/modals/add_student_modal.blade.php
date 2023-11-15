<!-- Add Student Modal -->
<div class="modal" id="myAddStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student to      @if ($selectedBatch)  {{ $selectedBatch->batch_name }} @endif </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.student') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="inputStudentNo">Student No</label>
                        <input type="text" name="student_no" class="form-control" id="inputStudentNo" placeholder="Enter Student number">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" name="student_name" class="form-control" id="inputName" placeholder="Enter Name">
                    </div>
                  
                         <label for="batchSelect"></label>
                         <input type="text" id="inputBatch" class="form-control" name="student_batch"  
                                @if ($selectedBatch)
                                    value="{{ $selectedBatch->id }}"
                                @endif

                                style="display: none;">
  
                    <div class="form-group">
                        <label for="inputBlock">Block</label>
                        <select class="form-select" aria-label="Default select example" name="student_block" id="inputBlock">
                        @foreach ($blocks as $block)
                            <option  value="{{ $block->id }}">{{ $block->block_name }}</option>
                            @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="inputCourse">Course</label>
                        <input type="text" name="student_course" class="form-control" id="inputCourse" placeholder="Enter Course">
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Contact No</label>
                        <input type="text" name="student_contact_no" class="form-control" id="inputContact" placeholder="Enter contact number">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="student_email" class="form-control" id="inputEmail" placeholder="Enter Email">
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
