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

            $("#department_id").val(r.join(', '))
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
            <input type="hidden" id="department_id" name="department_id" value="">
            <div class="col" id="jstree"></div>
        </div>
    </div>
</section>
