@extends('layouts.dashboard')

@section('content')
    @push('js')
        <script>
            $(function () {
                $('#jstree').jstree(
                    {
                        'core': {
                            'data': {!! load_dep(old('department_id')) !!}
                        },
                        "checkbox": {
                            "keep_selected_style": false
                        },
                        "theme": {
                            "variant": "large"
                        },
                        "plugins": ["radio"]
                    }
                );
            });

            $('#jstree').on('changed.jstree', function(e,data) {
                var i, j, r = [];
                for(i = 0, j = data.selected.length; i < j; i++) {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }
                $("#dep_id").val(r.join(', '))
            })
        </script>
    @endpush

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        @include('includes.error')
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('dash.size') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('size.store') }}" method="post">
                            @csrf
                            <input type="hidden" id="dep_id" name="department_id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_ar') }}</label>
                                    <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="color in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_ar') }}</label>
                                    <input name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="color in english">
                                </div>

                                <div id="jstree">

                                </div>

                                <div class="form-group">
                                    <label for="public">is public</label>
                                    <select class="form-control" name="is_public" id="public">
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ trans('dash.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
