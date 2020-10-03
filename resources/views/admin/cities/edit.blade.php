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
                        <li class="breadcrumb-item"><a href="{{ route('city.index') }}">Home</a></li>
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
                        <form role="form" action="{{ route('city.update', $city->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.country_ar') }}</label>
                                    <input value="{{ $city->city_name_ar }}" name="city_name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.country_en') }}</label>
                                    <input value="{{ $city->city_name_en }}" name="city_name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="country">Countries</label>
                                    <select name="country_id" id="country">
                                        <option value="7">{{ $city->city_name_ar }}</option>
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
