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
        @include('includes.error')
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('dash.create_shipping') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('shipping.update', $shipping->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_ar') }}</label>
                                    <input value="{{ $shipping->name_ar }}" name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.name_en') }}</label>
                                    <input value="{{ $shipping->name_en }}" name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="logo">logo</label>
                                    <input type="file" id="logo" name="icon" class="form-control">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="user_id" id="user">
                                        <option value="0">.........</option>
                                        @foreach($users as $user)
                                            <option @if($user->id === $shipping->user->id) selected @endif value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="somecomponent" style="width: 100%; height: 400px;"></div>

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
