<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head.head')

    <body class="access-denied" itemscope itemtype="http://schema.org/WebPage">

    <div class="container-fluid">
        <div class="row row-no-padding">
    
            <div class="col-md-12 text-center">

                @yield('content')

            </div>
    
        </div>
    </div>

  </body>
</html>   