<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="apple-touch-fullscreen" content="yes">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <!--favicon start-->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon.png') }}">
        <!--favicon end-->
    
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ config('app.desc', 'Laravel') }}">
    
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
        <meta property="og:description" content="{{ config('app.desc', 'Laravel') }}" />
        <meta property="og:url" content="{{ asset('/img/og-image.jpg') }}" />
        <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
        <meta property="og:image" content="{{ asset('/img/og-image.jpg') }}" />
        <meta property="og:image:secure_url" content="{{ asset('/img/og-image.jpg') }}" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="500" />
        <meta property="og:image:height" content="248" />
    
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 
    </head>