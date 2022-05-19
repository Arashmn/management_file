@extends('layout.master')
@section('title', __('public.title upload'))
@section('content')
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-alert />
        <x-validation />
        <div class="form-group">
            <label class="mr-2">@lang('public.Name')</label>
            <input type="text" name="Name" class="form-control">
        </div>

        <div class="form-group mt-3">
            <label class="mr-2">@lang('public.Upload your')</label>
            <input type="file" name="file" id="imgInp">
        </div>
        <hr>
        <div class="col text-center">
            <button type="submit" class="btn btn-primary text-end">@lang('public.submit')</button>
        </div>
        <div class="col text-center pt-5  preview">
            @lang('public.previewBI')
        </div>

        <div class="form-group mt-3 text-center pt-1 h1 ">
            <p class=""> <img style="width:450px; height:350px" id="blah"
                    src="{{ asset('image/no-image.png') }}" alt="your image" /></p>
        </div>
    </form>


    <x-butten-back />
@endsection
@section('footer_scripts')

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
