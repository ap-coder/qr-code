<!DOCTYPE html>
<html class="@yield('layout', 'boxed ') @hasSection('htmlClasses')@yield('htmlClasses') @endif"  itemscope @hasSection('htmlschema')itemtype="https://schema.org/@yield('htmlschema')"@endif @hasSection('htmlschema2')itemtype="https://schema.org/@yield('htmlschema2')" @endif @hasSection('htmlschema3')itemtype="https://schema.org/@yield('htmlschema3')" @endif>
<head>

    {{-- {!! SEO::generate(true) !!} --}}

    @yield('meta')
        @yield('jsonld')
        <!-- Mobile Metas -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('site/img/favicon.ico') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('site/img/apple-touch-icon.png') }}">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('site.layouts.partials.head')
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|3d-float">

        @yield('topjs')

</head>
<body @hasSection('bodyData') @yield('bodyData') @endif @hasSection('bodyClasses') class="@yield('bodyClasses')" @endif @hasSection('bodyschema') itemscope="" itemtype="http://schema.org/@yield('bodyschema')" @endif>

    <div role="main" class="main @yield('main-classes')">

        {{-- @include('flash::message') --}}

        @yield('content')
    </div>

    @include('site.layouts.partials.javascript')

    @yield('scripts')
    
</body>
</html>