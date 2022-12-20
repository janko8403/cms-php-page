<div class="navbar-left">
    <div class="closebtn open">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <ul class="nav-box-left">
        @foreach($pages as $page)
            @if($page->lng == Session::get('locale'))
            <li id="sort-item-mobile-{{$page->sort}}" class="item {{ (Request::path() == 'page/'.$page->slug) ? 'active' : '' }}"><a href="/page/{{ $page->slug }}">{{ $page->name }}</a></li>
            @endif
        @endforeach

        <li id="sort-item-mobile-10000000" class="item"><a class="item-contact" href="#contact">@lang('content.contact')</a></li>

        @foreach($languages as $language)
                <li id="sort-{{$language->sort}}"
                    class="item lang {{ (Session::get('locale') == $language->lng) ? 'active' : '' }}">
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

<div class="site-overlay"></div>