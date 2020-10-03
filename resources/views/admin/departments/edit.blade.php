@extends('layouts.dashboard')

@section('content')

    @push('js')
        <script>
            $(function () {
                $('#jstree').jstree(
                    {
                        'core': {
                            'data': {!! load_dep($dep->parent_id) !!}
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
                $("#parent_id").val(r.join(', '))
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
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('dash.create_country') }}</h3>
                        </div>

                        <form role="form" action="{{ route('departments.update', $dep->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="parent_id" name="parent_id" value="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.dep_ar') }}</label>
                                    <input value="{{ $dep->dep_name_ar }}" name="dep_name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.dep_en') }}</label>
                                    <input value="{{ $dep->dep_name_en }}" name="dep_name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="desc">description</label>
                                    <textarea class="form-control"  name="description" id="desc" cols="30" rows="10">
                                        {{ $dep->description }}
                                    </textarea>
                                </div>
                                <div>
                                    <div id="jstree">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="key">keyword</label>
                                    <textarea class="form-control" name="keyword" id="key" cols="30" rows="10">
                                        {{ $dep->keyword }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="icon">icon</label>
                                    <input type="file" name="icon">
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
