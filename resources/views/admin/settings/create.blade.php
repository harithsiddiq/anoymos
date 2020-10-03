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
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard Setting</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.save_setting') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sitename_ar">Site name in arabic</label>
                        <input class="form-control" type="text" id="sitename_ar" placeholder="site name"
                               name="sitename_ar"
                               value="{{ setting()->sitename_ar }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sitename_en">Site name in english</label>
                        <input class="form-control" type="text" id="sitename_en" placeholder="site name"
                               name="sitename_en"
                               value="{{ setting()->sitename_en }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input class="form-control" type="text" id="email" placeholder="email"
                               name="email"
                               value="{{ setting()->email }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="logo">logo</label>
                        <input class="form-control-sm" type="file" id="logo" placeholder="logo" name="logo">
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/storage').'/'.setting()->logo }}" alt=""
                    style="width: 50px; height: 50px">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="icon">icon</label>
                        <input class="form-control-sm" type="file" id="icon" placeholder="icon" name="icon">
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/storage').'/'.setting()->icon }}" alt=""
                    style="width: 50px; height: 50px">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="desc">description</label>
                        <textarea class="form-control" name="description" id="desc" cols="30" rows="10"
                                  placeholder=" website description...">
                            {{ setting()->description }}
                    </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="keywords">keywords</label>
                        <textarea class="form-control" name="keywords" id="keywords" cols="30" rows="10"
                                  placeholder="keywords...">
                            {{ setting()->keywords }}
                    </textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="lang">main language</label>
                        <select class="form-control" name="main_lang" id="lang">
                            <option @if(setting()->main_lang == 'ar') selected @endif value="ar">Arabic</option>
                            <option @if(setting()->main_lang == 'en') selected @endif value="en">English</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="status">status</label>
                        <select class="form-control" name="status" id="status">
                            <option @if(setting()->status == 'open') selected @endif value="open">open</option>
                            <option @if(setting()->status == 'close') selected @endif value="close">close</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="maintenence">maintenence</label>
                        <textarea class="form-control" name="message_maintenance" id="maintenence" cols="30" rows="10"
                                  placeholder="maintenence...">
                            {{ setting()->message_maintenance }}
                    </textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
