<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head.head')

<body itemscope itemtype="http://schema.org/WebPage">

    @include('partials.components.preloader')

    @include('partials.header.nav')

    @include('partials.header.header')

    <main role="main" id="next">

    @yield('content')

    @include('partials.scripts.scripts')

</body>
</html>