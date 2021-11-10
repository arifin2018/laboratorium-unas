<div class="d-flex">
    <a href="{{ route('jurusan.edit', $model->id) }}" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
    <form action="{{ route('jurusan.destroy', $model->id) }}" method="POST" class="mx-1">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>
