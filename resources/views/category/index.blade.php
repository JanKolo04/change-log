@extends('layout')

@section('content')
    <div class="container" id="category_container">
        <div class="row">
            @php($i = 0)
            
            @foreach ($categories as $category)
                <div class="col"><a href="/category/{{ $category->id }}">{{ $category->name }}</a></div>
                @if (($i%2) != 0)
                    <div class="w-100"></div>
                @endif

                @php($i += 1)
            @endforeach
        </div>
    </div>
@endsection