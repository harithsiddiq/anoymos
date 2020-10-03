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
                            <h3 class="card-title">{{ trans('dash.product') }}</h3>
                        </div>
                        <div class="p-2">
                            <div class="btn btn-primary btn-sm"><i class="fa fa-save"></i> save</div>
                            <div class="btn btn-success btn-sm"><i class="fa fa-save"></i> save and next</div>
                            <div class="btn btn-info btn-sm"><i class="fa fa-copy"></i> copy product</div>
                            <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</div>
                        </div>
                        <!-- /.card-header -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#department" role="tab" aria-controls="profile" aria-selected="false">Department</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="profile" aria-selected="false">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#media" role="tab" aria-controls="profile" aria-selected="false">Media</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#size" role="tab" aria-controls="contact" aria-selected="false">Product Size</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @include('admin.products.forms.info')
                            </div>

                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab">
                                @include('admin.products.forms.setting')
                            </div>
                            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="profile-tab">
                                @include('admin.products.forms.info')
                            </div>
                            <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="contact-tab">
                                Contact
                            </div>
                            <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="contact-tab">
                                @include('admin.products.forms.department')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
