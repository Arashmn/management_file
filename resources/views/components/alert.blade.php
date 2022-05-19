@if (session('success'))
    <div class="alert alert-success text-center" role="alert">@lang('public.success')</div>
@endif
@if (session('successUpdate'))
    <div class="alert alert-success text-center" role="alert">@lang('public.successUpdate')</div>
@endif

@if (session('Deleted'))
<div class="alert alert-info text-center" role="alert">{{ session('Deleted') }}</div>
@endif

