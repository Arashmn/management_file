@extends('layout.master')
@section('title', __('public.title index'))
@section('content')
<x-alert/>
    <div class="h2 font-weight-bold">@lang('public.List file')</div>
    <a href="{{ route('files.create') }}" target="blank"> <button class="btn btn-primary  ">@lang('public.button file')</button></a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">@lang('table.id')</th>
                    <th scope="col">@lang('table.thumbnail')</th>
                    <th scope="col">@lang('table.Name')</th>
                    <th scope="col">@lang('table.volume')</th>
                    <th scope="col">@lang('table.createat')</th>
                    <th scope="col">@lang('table.updateat')</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($files as $key => $item)
                    <tr class="bg-blue">
                        <td>{{ $key + 1 }} </td>
                        <td class="pt-3"> <img src="{{ asset('thumbnails/' . $item->thumbnail) }}"
                                class="h-75 align-self-end" alt="">
                        </td>
                        <td class="pt-2">
                            <div class="pl-lg-6 pl-md-3 pl-1 name">{{ $item->Name }}</div>
                        </td>
                        <td class="pt-3 mt-1"> {{ $item->volume }} </td>
                        <td class="pt-3">{{ $item->created_at }}</td>
                        <td class="pt-3">{{ $item->updated_at }}</td>
                        <td class="pt-3">
                            <div class="btn-group ">
                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @lang('table.status')
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item text-end" target="blank"
                                            href="{{ route('files.show', $item->id) }}">@lang('table.btn Show')</a></li>
                                    <li><a class="dropdown-item text-end"
                                            href="{{ route('files.edit', $item->id) }}">@lang('table.btn Update')</a></li>

                                    <li>

                                        <form action="{{ route('files.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-primary text-end dropdown-item text-end">@lang('table.btn Delete')</button>
                                        </form>
                                    </li>


                                </ul>
                            </div>
                    </tr>
                @endforeach



            </tbody>

        </table>
        <div class="pagination justify-content-center">
            {{ $files->links() }}
        </div>

    </div>
@endsection
