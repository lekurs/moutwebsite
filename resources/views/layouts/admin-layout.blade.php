<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')
    <title>Mout</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/colorpicker/color-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/AristaProAlternate-Regular.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/AristaProAlternate-Hairline.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/AristaProAlternate-Light.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/AristaProAlternate-Fat.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')
    <meta name="description" content="description du site" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('social')
    <!-- Création des metatags réseaux sociaux -->
        <!-- Metatags FB -->
        <meta property="og:title" content="Mout Web Agency" />
        <meta property="og:type" content="Mout Web Agency" />
        <meta property="og:url" content="moutwebagency.com" />
        <meta property="og:description" content="Mout Web Agency" />
        <meta property="og:image" content="{{ asset('assets/images/logo/bandeau-mout.png') }}" />

        <!-- Metatag Twitter -->
        <meta name="twitter:card" content="Mout Web Agency" />
        <meta name="twitter:tittle" content="Mout Web Agency" />
        <meta name="twitter:description" content="Mout Web Agency" />
    @endsection
</head>
<body>
    <div class="main-wrapper">
        <div class="bo-header">
            <div class="back-home">
                <a href="{{ route('homeAdmin') }}">
                    <i class="fal fa-home admin-home-icon"></i>
                </a>
            </div>
            <div class="open-nav">
                <a href="">
                    <span class="bars-container">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>
                </a>
            </div>
            <div class="site-name">
                <h1>Mout</h1>
            </div>
            <ul class="nav-menu">
                <li class="mout-top-menu-admin">
                    <a href="#" class="mout-top-dropdown-menu">
                        <span class="user-img">
                            @if(!is_null(auth()->user()->profile_photo_path))
                                <img src="{{ asset('storage/images/uploads/profiles/img/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}" class="img-fluid user-img">
                            @else
                                <span class="profile-name randcolor">{{ substr(auth()->user()->lastname, 0, 1) . substr(auth()->user()->name, 0, 1) }}</span>
                            @endif
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu main-drop">
                        <a href="{{ route('profiles.show') }}" class="dropdown-item">
                            <i class="fal fa-edit"></i> Profil
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <i class="fal fa-user-times"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar">
            <div class="mout-left-panel-informations">
                <div class="mout-left-panel-profil">
                    <div class="mout-profil-left">
                        @if(!is_null(auth()->user()->profile_photo_path))
                            <img src="{{ asset('storage/images/uploads/profiles/img/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}" class="img-fluid img-portrait-bo-left-side">
                        @else
                            <span class="profile-name randcolor">{{ substr(auth()->user()->lastname, 0, 1) . substr(auth()->user()->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div class="mout-profil-right">
                        <h4 class="mout-profil-name">{{ auth()->user()->lastname }}<span class="text-uppercase ml-1">{{ auth()->user()->name }}</span>
                            <a href="{{ route('logout') }}"><i class="fas fa-user-times" style="color: #ffffff"></i></a></h4>
                        <span>Admin</span>
                    </div>
                </div>
                <!-- TAB PANEL TOP -->
            @include('layouts.nav._tab-panel-top')
            <!-- /TAB PANEL TOP -->

                <!-- TAB PANEL BOT -->
                <div class="mout-tab-content">
                    @include('layouts.nav._nav-pills-with-parent')
                </div>
                <!-- /TAB PANEL BOT -->
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        @yield('page-header')
                    </div>
                </div>
                @include('layouts.flashes.flash_message')
                @yield('body')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dd86c136c7.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="{{ asset('js/admin/bo-mout-nav-bar.js') }}"></script>
    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>
    <script  src="{{ asset('js/app.js') }}"></script>
@yield('js')
</body>
</html>
