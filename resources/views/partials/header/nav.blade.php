<nav class="navbar navbar-expand-md navbar-default fixed-top header-fixed">
    <div class="container">

        <a class="navbar-brand" href="/"><img class="img-responsive" src="{{ asset('img/logo.svg') }}" alt="cph"></a>

        @include('partials.components.hamburger')
        
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav ml-auto">

                @foreach($pages as $page)
                    @if($page->lng == Session::get('locale'))
                    <li id="sort-item-{{$page->sort}}"
                        class="nav-item {{ (Request::path() == 'page/'.$page->slug) ? 'active' : '' }}">
                        <a href="/page/{{ $page->slug }}">{{ $page->name }}</a></li>
                    @endif
                @endforeach

                <li id="sort-item-100000" class="nav-item"><a href="#contact">@lang('content.contact')</a></li>

                @foreach($languages as $language)
                    <li id="sort-{{$language->sort}}"
                        class="nav-item lang {{ (Session::get('locale') == $language->lng) ? 'active-lang' : '' }}">
                        <a 
                            class="bold" 
                            onclick="event.preventDefault(); document.getElementById('set-{{$language->lng}}').submit();"
                        >
                            {{$language->lng}}
                        </a>
                        <form id="set-{{ $language->lng }}"
                            action="{{ url('/set-lng') }}"
                            method="POST"
                            style="display: none;">
                            @csrf
                            <input type="hidden" name="setlng" value="{{ $language->lng }}">
                        </form>
                    </li>
                @endforeach
            </ul>

        </div>

    </div>
</nav>

@include('partials.components.navbarleft')