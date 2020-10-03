<form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
<div class="form-group">
    <label for="price">{{ trans('dash.price') }}</label>
    <input name="price" type="number" class="form-control" id="price" placeholder="color in arabic">
</div>
<div class="form-group">
    <label for="stoke">{{ trans('dash.stoke') }}</label>
    <input name="stoke" type="number" class="form-control" id="stoke" placeholder="color in arabic">
</div>
<div class="form-group">
    <label for="sp_price">{{ trans('dash.sp_price') }}</label>
    <input name="sp_price" type="number" class="form-control" id="sp_price" placeholder="color in arabic">
</div>

<div class="form-group">
    <label for="start_at">{{ trans('dash.start_at') }}</label>
    <input name="start_at" type="date" class="form-control datepicker " id="start_at">
</div>

<div class="form-group">
    <label for="end_at">{{ trans('dash.end_at') }}</label>
    <input name="end_at" type="date" class="form-control datepicker " id="end_at">
</div>

<div class="form-group">
    <label for="end_at">{{ trans('dash.end_at') }}</label>
    <select class="form-control" name="status" id="">
        <option value="">.......</option>
        <option value="pending">Pending</option>
        <option value="reject">Reject</option>
        <option value="approval">Approval</option>
    </select>
</div>
    </div>
</form>
