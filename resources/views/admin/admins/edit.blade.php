@extends('layouts.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Home</a></li>
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
                        <h3 class="card-title">{{ trans('dash.create_admin') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admins.update', $admin->id) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('dash.user') }}</label>
                                <input name="name" value="{{ $admin->name }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('dash.email') }}</label>
                                <input name="email" value="{{ $admin->email }}" type="email" class="form-control" id="exampleInputEmail1" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{ trans('dash.Password') }}</label>
                                <input name="password" value="" type="password" class="form-control" id="exampleInputPassword1" placeholder="new password">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">{{ trans('dash.password_confirmation') }}</label>--}}
{{--                                <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm password">--}}
{{--                            </div>--}}
                            <div class="custom-control custom-switch">
                                <input @if($admin->active == 1) checked @endif name="active" type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">active</label>
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
