@if(Session()->has('error'))
    <button type="button" class="btn btn-danger swalDefaultSuccess">
        {{ Session()->get('error') }}
    </button>
@endif
