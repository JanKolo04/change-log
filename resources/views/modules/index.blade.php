@extends('layout')

@section('content')
    <a href="/category/{{ $category_id }}" id="page_back"><- Back</a>

    @if (count($tags) > 0)
        <h5>Moduł działa w wersjach:</h5>

        <div id="module_tags">
            @foreach ($tags as $tag)
                <div class="module_tag" style="background-color: {{ $tag->bg_color }}; color: {{ $tag->text_color }};">
                    {{ $tag->text }}
                </div>    
            @endforeach
        </div>
    @endif

    <h2>{{ $module->name }}</h2>

    <p id="module_description">{{ $module->description }}</p>

    <h3>Changelog</h3>
    <hr>

    <div id="changelog">
        <h6>Pobierz najnowszą wersję:</h6>
        <a id="download_module" href="https://github.com/modules4presta/glosujnaaborcje/archive/refs/heads/main.zip">Pobierz</a>

        <div class="changes">
            @if ($versions) 
                @foreach ($versions as $version)
                    <div class="versions">
                        <p class="version-title">Wersja <b>{{ $version->version }}</b> - {{ $version->add_date }}</p>
                        <hr>
                        @foreach ($issues as $issue)
                            @if ($issue->changelog_id == $version->id)
                                <p>
                                    @if ($issue->fix == 0)
                                        <i class="fa fa-bug"style="color: red;"></i>
                                    @else
                                        <i class="fa fa-bug"style="color: green;"></i>
                                    @endif
                                    {{ $issue->description }}
                                </p>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection