<div class="modal fade" id="deleteBatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Including the separate modal content file -->
                this is delete batch modal
                @foreach ($batches as $batch)
                <form action="{{ route('deleteBatch', ['batchId' => $batch->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this batch and associated blocks & students?')"><i
                            class="fas fa-trash">{{ $batch->batch_name }}</i></button>
                </form>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Add other buttons or actions if needed -->
            </div>
        </div>
    </div>
</div>
