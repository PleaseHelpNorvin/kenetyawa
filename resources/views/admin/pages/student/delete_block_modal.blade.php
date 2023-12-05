
<div id="myModal2" class="modal">
    <div class="modal-content">
        <span class="close2">&times;</span>
        <nav class="navbar navbar-expand-lg navbar-light bg-light border">
            <ul class="navbar-nav mr-auto">
                @foreach ($blocks as $block)
                    <li class="nav-item">
                        <form action="{{ route('deleteBlock', ['block_id' => $block->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin-right: 10px;"
                                onclick="return confirm('Are you sure you want to delete this block and associated students?')">
                                <i class="fas fa-trash"></i>{{ $block->block_name }}
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
