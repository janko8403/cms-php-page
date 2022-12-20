<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    
</head>

<body class="">
    <div id="app">
        <div class="wrapper ">
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="../backend/img/sidebar-1.jpg">
                <div class="logo">
                    <a href="{{ url('admin/dashboard') }}" class="simple-text logo-normal">
                    CMS CPH
                    </a>
                </div>
                <div class="sidebar-wrapper">

                    @if (Auth::check() && Auth::user()->hasRole('Admin'))
                        <ul class="nav">
                            <li class="nav-item {{ (Request::is('admin/dashboard') ? 'active' : '') }}">
                                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                                    <i class="material-icons">dashboard</i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{ (Request::is('admin/users', 'admin/users') ? 'active' : '') }}">
                                <a class="nav-link" data-toggle="collapse" href="#users-nav">
                                    <i class="material-icons">person</i>
                                    <p>Użytkownicy
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="users-nav">
                                    <ul class="nav">
                                        <li class="nav-item {{ (Request::is('admin/users') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/users') }}">
                                                <span class="sidebar-mini"><i class="material-icons">people</i></span>
                                                <span class="sidebar-normal"> Użytkownicy</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ (Request::is('admin/add-user') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/add-user') }}">
                                                <span class="sidebar-mini"><i class="material-icons">people</i></span>
                                                <span class="sidebar-normal"> Dodaj nowego</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#language-nav">
                                    <i class="material-icons">language</i>
                                    <p>Języki
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="language-nav">
                                    <ul class="nav">
                                        <li class="nav-item {{ (Request::is('admin/language') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/language') }}">
                                                <span class="sidebar-mini"><i class="material-icons">language</i></span>
                                                <span class="sidebar-normal"> Wszystkie</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ (Request::is('admin/add-language') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/add-language') }}">
                                                <span class="sidebar-mini"><i class="material-icons">library_add</i></span>
                                                <span class="sidebar-normal"> Dodaj nowy</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item {{ (Request::is('admin/pages', 'admin/pages') ? 'active' : '') }}">
                                <a class="nav-link" data-toggle="collapse" href="#pages-nav">
                                    <i class="material-icons">article</i>
                                    <p>Strony
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="pages-nav">
                                    <ul class="nav">
                                        <li class="nav-item {{ (Request::is('admin/pages') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/pages') }}">
                                                <span class="sidebar-mini"><i class="material-icons">article</i></span>
                                                <span class="sidebar-normal">Wszystkie</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ (Request::is('admin/add-page') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/add-page') }}">
                                                <span class="sidebar-mini"><i class="material-icons">note_add</i></span>
                                                <span class="sidebar-normal"> Dodaj nową</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item {{ (Request::is('admin/footers', 'admin/footers') ? 'active' : '') }}">
                                <a class="nav-link" data-toggle="collapse" href="#footers-nav">
                                    <i class="material-icons">space_dashboard</i>
                                    <p>Stopka
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="footers-nav">
                                    <ul class="nav">
                                        <li class="nav-item {{ (Request::is('admin/footers') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/footers') }}">
                                                <span class="sidebar-mini"><i class="material-icons">space_dashboard</i></span>
                                                <span class="sidebar-normal">Wszystkie</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ (Request::is('admin/add-footer') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/add-footer') }}">
                                                <span class="sidebar-mini"><i class="material-icons">dashboard_customize</i></span>
                                                <span class="sidebar-normal"> Dodaj nową</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item {{ (Request::is('admin/media', 'admin/media') ? 'active' : '') }}">
                                <a class="nav-link" data-toggle="collapse" href="#media-nav">
                                    <i class="material-icons">crop_original</i>
                                    <p>Media
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="media-nav">
                                    <ul class="nav">
                                        <li class="nav-item {{ (Request::is('admin/media') ? 'active' : '') }}">
                                            <a class="nav-link" href="{{ url('admin/media') }}">
                                                <span class="sidebar-mini"><i class="material-icons">space_dashboard</i></span>
                                                <span class="sidebar-normal">Biblioteka</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    @endif

                    <a style="position:absolute; bottom: 30px; padding: 10px; color:#3C4858; font-size:14px;" target="_blank" href="/">
                        <i class="material-icons">public</i> Przejdź do strony głównej
                    </a>

                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand">@yield('title')</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                @if ( Auth::check())
                                <li class="nav-item">
                                    {{ Auth::user()->name }}
                                </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                        <p class="d-lg-none d-md-block">
                                            Account
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                        @if ( Auth::check())
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                Wyloguj się
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('backend/js/plugins/moment.min.js') }}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('backend/js/plugins/sweetalert2.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Parallax effects -->
    <script src="{{ asset('backend/js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
    <!-- Copy clipboard -->
    <script src="{{ asset('backend/js/plugins/clipboard.min.js') }}" type="text/javascript"></script>


    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $sidebar_img_container = $sidebar.find('.sidebar-background');
                $full_page = $('.full-page');
                $sidebar_responsive = $('body > .navbar-collapse');
                window_width = $(window).width();
                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }
                }
                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });
                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');
                    var new_color = $(this).data('color');
                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }
                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }
                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });
                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');
                    var new_color = $(this).data('background-color');
                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });
                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');
                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');
                    var new_image = $(this).find("img").attr('src');
                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }
                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }
                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }
                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });
                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');
                    $input = $(this);
                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }
                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }
                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }
                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }
                        background_image = false;
                    }
                });
                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');
                    $input = $(this);
                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;
                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
                    } else {
                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');
                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });
            });
        });
    </script>

    <style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active-panel, .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
    </style>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active-panel");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
        }
    </script>

    <script>
        function showHeader() {
            var checkBox = document.getElementById("disable-header");
            var text = document.getElementById("show-header");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
        function showButtons() {
            var checkBox = document.getElementById("disable-buttons");
            var panel = document.querySelector(".panel");
            var text = document.getElementById("show-buttons");
            var rect = panel.clientHeight;
            if (checkBox.checked == true) {
                console.log(panel);
                console.log(rect);
                console.log(rect + 200 + 'px');
                panel.style.maxHeight = rect + 200 + 'px';
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>

    @if(Session::has('message'))
    <script>
        $.notify({
            message: '{{ Session::get('message') }}'
        }, {
            type: '{{ Session::get('type') }}'
        });
    </script>
    @endif


</body>

</html>
