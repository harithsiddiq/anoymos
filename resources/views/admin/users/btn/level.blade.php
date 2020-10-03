<sapn class="btn btn-sm
    {{ $level == 'user' ? 'btn-info':''}}
    {{ $level == 'company' ? 'btn-warning':''}}
    {{ $level == 'vendor' ? 'btn-success':''}} ">

{{ trans('dash.level.'.$level) }}

</sapn>

