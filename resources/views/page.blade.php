@extends('layouts.app')

@section('content')

    @if($page)
    {!! $page->content !!}
    @endif

    @if($footer && $footer->contact_info && $page && $page->info_refugees == 1)
        @include('partials.section.neded-help')
    @endif
        
    @if($footer && $footer->info && $page && $page->additional_options == 1)
        @include('partials.section.footer-section')
    @endif

    </main>

    @if($footer)
        @include('partials.footer.footer')
    @endif

@endsection