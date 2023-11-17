<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Add Student Modal -->

<div class="modal" id="myAddStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student to      @if ($selectedBatch)  {{ $selectedBatch->batch_name }} @endif </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="validationErrors"></div>  
                <form action="{{ route('add.student') }}" method="POST" id="myForm">
                    @csrf

                    <div class="form-group">
                        <label for="inputStudentNo">Student No</label>
                        <input type="text" name="student_no" class="form-control" id="inputStudentNo" placeholder="Enter Student number">
                        
                        <span class="text-danger" id="student_no"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" name="student_name" class="form-control" id="inputName" placeholder="Enter Name">
                        <span class="text-danger" id="student_name"></span>
                    </div>
                    {{-- <div class="form-group"> --}}
                        <label for="batchSelect"></label>
                         <input type="text" id="inputBatch" class="form-control" name="student_batch"  
                                @if ($selectedBatch)
                                    value="{{ $selectedBatch->id }}"
                                @endif
                                style="display: none;">

                    {{-- </div> --}}
                         
                    <div class="form-group">
                        <label for="inputBlock">Block</label>
                        <select class="form-select" aria-label="Default select example" name="student_block" id="inputBlock">
                            <option value="#"></option>
                            @foreach ($blocks as $block)
                                <option  value="{{ $block->id }}">{{ $block->block_name }}</option>
                            @endforeach
                        </select>
                        @error('student_block')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="inputCourse">Course</label>
                        <input type="text" name="student_course" class="form-control" id="inputCourse" placeholder="Enter Course">
                        <span class="text-danger" id="student_course"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Contact No</label>
                        <input type="text" name="student_contact_no" class="form-control" id="inputContact" placeholder="Enter contact number">
                        <span class="text-danger" id="student_contact_no"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="student_email" class="form-control" id="inputEmail" placeholder="Enter Email">
                        <span class="text-danger" id="student_email"></span>
                    </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
            </div>
             
        </form>
           
        </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault();
            
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // If submission is successful, perform desired actions
                    // For example, hide modal, show success message, etc.
                    console.log('Form submitted successfully!');
                    // $(this).submit();
                    location.reload();
                    $('#myAddStudentModal').modal('hide');
                },
                error: function(xhr) {
                    
                    if (xhr.status === 422) {
                        // If status code is 422 (validation error)
                        // Clear previous validation errors
                        // $('#validationErrors').empty();
                        // Parse errors from the response
                        const errors = xhr.responseJSON.errors;

                        // Iterate through each error and display within modal
                        $.each(errors, function(key, value) {
                            //if (key == student_no){
                                $('#'+key).append('<span>' + value + '</span>');    
                            //}
                            console.log('#'+key);
                           // $('#validationErrors').append('<p>' + value + '</p>');
                        });
                    } else {
                        // Handle other error cases here
                        console.error('An error occurred:', xhr);
                    }
                }
            });
        });
    });
</script>