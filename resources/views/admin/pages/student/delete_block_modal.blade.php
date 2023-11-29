<div class="modal fade" id="DeleteBlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                @foreach ($blocks as $block)
                <!-- Blade Template for Deleting Block -->
                <!-- Blade Template for Deleting Block -->
    <form action="{{ route('deleteBlock', ['block_id' => $block->id]) }}" method="POST" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this block and associated students?')">
            <i class="fas fa-trash"></i>
            {{ $block->block_name }}
        </button>
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
