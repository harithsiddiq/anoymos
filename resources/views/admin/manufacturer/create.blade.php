@extends('layouts.dashboard')

@section('content')
        @push('js')
            <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
            <script src="{{ asset('asset/js/locationpicker.jquery.js') }}"></script>

            <script>

                $('#somecomponent').locationpicker({
                    location: {
                        latitude: 46.15242437752303,
                        longitude: 2.7470703125
                    },
                    radius: 300,
                    inputBinding: {
                        latitudeInput: $('#us2-lat'),
                        longitudeInput: $('#us2-lon'),
                        radiusInput: $('#us2-radius'),
                        locationNameInput: $('#us2-address')
                    }
                });

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
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('dash.create_brand') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('manufacturer.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_ar') }}</label>
                                    <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_en') }}</label>
                                    <input name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.facebook') }}</label>
                                    <input name="facebook" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.twitter') }}</label>
                                    <input name="twitter" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.website') }}</label>
                                    <input name="website" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.contact_name') }}</label>
                                    <input name="contact_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>

                                <div class="form-group">
                                    <label for="logo">logo</label>
                                    <input type="file" id="logo" name="icon" class="form-control">
                                </div>

                                <div id="somecomponent" style="width: 500px; height: 400px;"></div>

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
