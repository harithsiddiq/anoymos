<form action="{{ route('state.destroy', $id) }}" method="POST">
    @csrf
<button type="submit" class="btn btn-danger btn-sm">
    delete <i class="fa fa-binoculars"></i>
</button>
</form>
