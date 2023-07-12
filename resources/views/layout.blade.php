<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value) data-{{$key}}='{{$value}}' @endforeach
@endisset
>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Acorn Admin Template | {{$title}}</title>
    <meta name="description" content="{{$description}}"/>
    @include('layouts.head')
</head>

<body>
<div id="root">
    <div id="nav" class="nav-container d-flex" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
    data-{{$key}}="{{$value}}"
        @endforeach
        @endisset
    >
        @include('layouts.nav')
    </div>
    <main
        @isset($custom_main_class)
        class="{{$custom_main_class}}"
        @endisset
    >
        @yield('content')
    </main>
    @include('layouts.footer')
</div>
@include('layouts.modal_settings')
@include('layouts.modal_search')
@include('layouts.scripts')
</body>
</html>
