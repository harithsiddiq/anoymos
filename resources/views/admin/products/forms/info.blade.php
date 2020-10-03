<form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('dash.title') }}</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="color in arabic">
            </div>
            <div class="form-group">
                <label for="content">{{ trans('dash.content') }}</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>


{{--            <div class="form-group">--}}
{{--                <label for="exampleInputEmail1">{{ trans('dash.photo') }}</label>--}}
{{--                <input name="photo" type="file" class="form-control" id="exampleInputEmail1" placeholder="color">--}}
{{--            </div>--}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ trans('dash.submit') }}</button>
        </div>
    </form>
