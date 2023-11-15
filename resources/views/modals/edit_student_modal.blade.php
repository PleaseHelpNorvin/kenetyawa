
    @foreach ($students as $student)
        <tr>
            <!-- ... (other columns) ... -->
            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $student->id }}">Edit</button>
                <!-- Edit Student Modal -->
                <div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1" aria-labelledby="editStudentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('update.student', ['student' => $student->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editStudentModalLabel{{ $student->id }}">Edit Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Update your form fields for editing a student here -->
                                    <!-- Example: Student Name input field -->
                                    <label for="edit_student_name">Name:</label>
                                    <input type="text" id="edit_student_name" name="name" class="form-control" value="{{ $student->name }}">

                                    <label for="edit_student_student_no">Student No:</label>
                                    <input type="text" id="edit_student_student_no" name="student_no" class="form-control" value="{{ $student->student_no }}">

                                    <label for="edit_student_batch">Batch:</label>
                                    <input type="text" id="edit_student_batch" name="batch" class="form-control" value="{{ $student->batch }}">

                                    <!-- Add other fields as needed -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
