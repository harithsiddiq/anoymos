<form action="{{ route('admins.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">
    delete <i class="fa fa-binoculars"></i>
</button>
</form>
