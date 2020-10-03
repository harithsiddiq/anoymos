@extends('layouts.dashboard')


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="form_data" action="{{ route('admins.delete_all') }}" method="post">
                            @csrf
                            {!! $dataTable->table(['class' => 'dataTable table table-bordered table-hover'], true) !!}
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>

<div class="modal fade" id="multiDeleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger hidden">you must chose at least one record ?<span class="record_count"></span></div>
        <div class="alert alert-danger hidden">you wont delete <strong class="record_count">5</strong> record from database ?</div>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-danger btn-sm del_all">delete all</button>
      </div>
    </div>
  </div>
</div>
@push('js')
    <script>
        deleteAll();
    </script>
        {!! $dataTable->scripts() !!}
@endpush

@endsection
