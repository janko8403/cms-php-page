<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head.head')

<body class="login-page" itemscope itemtype="http://schema.org/WebPage">

    <main role="main">

    @yield('content')

    </main>

    @include('partials.scripts.scripts')

</body>
</html>