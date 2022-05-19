@extends('layout.master')
@section('title', __('public.title Show'))
@section('content')

<label class="mr-2">@lang('public.Name')</label> : {{ $file->Name }}
    <div class="text-center">

        <img style="width:845px; height:670px" src="{{ $file->Image }}">
    </div>

    <x-butten-back/>
@endsection
