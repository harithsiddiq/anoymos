@extends('layouts.dashboard')

@section('content')
    !-- Content Header (Page header) -->
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('country.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.country_ar') }}</label>
                                    <input name="country_name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.country_en') }}</label>
                                    <input name="country_name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{ trans('dash.mob') }}</label>
                                    <input name="mob" type="text" class="form-control" id="exampleInputPassword1" placeholder="mobile">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{ trans('dash.code') }}</label>
                                    <input name="code" type="text" class="form-control" id="exampleInputPassword1" placeholder="code">
                                </div>
                                <div class="form-group">
                                    <label for="currency">{{ trans('dash.currency') }}</label>
                                    <input name="currency" type="text" class="form-control" id="currency" placeholder="currency">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="logo">
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
