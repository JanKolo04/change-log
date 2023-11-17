@extends('layout')

@section('content')
    <a href="/" id="page_back"><- Back</a>

    <div class="container" id="category_container">
        <div class="row">
            @php($i = 0)
            
            @foreach ($modules as $module)
                <div class="col"><a href="/category/{{ $category_id }}/module/{{ $module->id }}">{{ $module->name }}</a></div>
                @if (($i%2) != 0)
                    <div class="w-100"></div>
                @endif

                @php($i += 1)
            @endforeach
        </div>
    </div>
@endsection