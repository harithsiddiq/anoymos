@extends('layouts.dashboard')

@section('content')

@push('js')
    <script>
        $(function () {
            $('#jstree').jstree(
                {
                    'core': {
                        'data': {!! load_dep() !!}
                    },
                    "checkbox": {
                        "keep_selected_style": true
                    },
                    "theme": {
                        "variant": "large"
                    },
                    "plugins": ["radio"]
                }
            );
        });

        $('#jstree').on('changed.jstree', function(e,data) {
            var i, j, r = [];
            for(i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
            }

            $("#parent_id").val(r.join(', '))
            if (r.join(', ') !== '') {
                $(".controls").removeClass('d-none');

                let lint_edit = '{{ route('departments.edit', "id") }}'
                lint_edit = lint_edit.replace('id', r.join(', '))
                $(".btn-edit").attr('href', lint_edit);

                let lint_del = '{{ route('departments.destroy', "id") }}'
                lint_del = lint_del.replace('id', r.join(', '))
                $(".btn-del").attr('href', lint_del);
            }
        })
    </script>
@endpush


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2 d-none controls">
                <a href="" class="btn btn-primary btn-sm btn-edit">Edit <span class="fa fa-edit"></span></a>
                <a href="" class="btn btn-danger btn-sm btn-del">Delete <span class="fa fa-trash"></span></a>
                <input type="hidden" id="parent_id" name="parent_id" value="">
            </div>
            <div class="col" id="jstree"></div>


        </div>
    </div>
</section>


@endsection
