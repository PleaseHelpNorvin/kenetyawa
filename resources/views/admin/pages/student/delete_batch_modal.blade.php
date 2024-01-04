
<div class="modal fade" id="deleteBatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border">
                    <ul class="navbar-nav mr-auto">
                        @foreach ($batches as $batch)
                            <li class="nav-item">
                                <form action="{{ route('deleteBatch', ['batchId' => $batch->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="margin-right: 10px;"
                                        onclick="return confirm('Are you sure you want to delete this batch and associated blocks & students?')">
                                        <i class="fas fa-trash"></i>{{ $batch->batch_name }}
                                    </button>
                                    {{-- <span>{{ $batch->batch_name }}</span> --}}
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Add other buttons or actions if needed -->
            </div>
        </div>
    </div>
</div>
<div id="deleteBatchModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close1">&times;</span>
      {{-- <h2>Modal Header</h2> --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <ul class="navbar-nav mr-auto">
            @foreach ($batches as $batch)
                <li class="nav-item">
                    <form action="{{ route('deleteBatch', ['batchId' => $batch->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="margin-right: 10px;"
                            onclick="return confirm('Are you sure you want to delete this batch and associated blocks & students?')">
                            <i class="fas fa-trash"></i>{{ $batch->batch_name }}
                        </button>
                        {{-- <span>{{ $batch->batch_name }}</span> --}}
                    </form>
                </li>
            @endforeach
        </ul>
    </nav>
    </div>
  
  </div>
