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
                            <h3 class="card-title">{{ trans('dash.create_state') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('state.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.state_ar') }}</label>
                                    <input name="state_name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in arabic">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('dash.state_en') }}</label>
                                    <input name="state_name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="country in english">
                                </div>
                                <div class="form-group">
                                    <label for="country">Countries</label>
                                    <select class="form-control country" name="country_id" id="country">
                                    <option value="0">...........</option>
                                    @foreach($countries as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->country }}
                                            </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none" id="city">
                                    <label for="country">Cities</label>
                                    <select class="form-control city" name="city_id">

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

    @push('js')
        <script>
            $(document).ready(function() {
                $(document).on('change', '.country', function() {
                    let country_id = $('.country option:selected').val();
                    let cityClass = $(".city")
                    let cityID = $("#city")

                    let opt = "<option value='&id'>$name</option>"

                    cityClass.html('')
                    if (country_id > 0) {
                        $.ajax({
                            url: "{{ route('state.city') }}",
                            type: 'post',
                            data: {country: country_id, _token: "{{ csrf_token() }}"},
                            success(data) {
                                cityID.removeClass('d-none');
                                data.forEach(el => {
                                    let item = opt.replace("&id", el.id)
                                    item = item.replace('$name', el.city_name_en)
                                    cityClass.append(item)
                                })
                            },
                            error(er) {
                                console.log(er)
                            }
                        })
                    } else {
                        cityClass.html('');
                        cityID.addClass('d-none')
                    }
                })
            })
        </script>
    @endpush
@endsection
