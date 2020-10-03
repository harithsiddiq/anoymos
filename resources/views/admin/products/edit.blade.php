@extends('layouts.dashboard')

@section('content')
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
                            <h3 class="card-title">{{ trans('dash.color') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('color.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_ar') }}</label>
                                    <input value="{{ $color->name_ar }}" name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="color in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_ar') }}</label>
                                    <input value="{{ $color->name_en }}" name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="color in english">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.color') }}</label>
                                    <input value="{{ $color->color }}" name="color" type="color" class="form-control" id="exampleInputEmail1" placeholder="color">
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
