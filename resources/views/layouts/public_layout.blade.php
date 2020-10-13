<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MOUT - @yield('title')</title>

    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dd86c136c7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800|Playfair+Display:400,700" rel="stylesheet">

    @yield('js')

    @yield('styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- /vendors--}}
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
        <meta property="og:url" content="moutwebdesign.com" />
        <meta property="og:description" content="Mout Web Agency" />
        <meta property="og:image" content="{{ asset('assets/images/logo/bandeau-mout.png') }}" />

        <!-- Metatag Twitter -->
        <meta name="twitter:card" content="Mout Web Agency" />
        <meta name="twitter:tittle" content="Mout Web Agency" />
        <meta name="twitter:description" content="Mout Web Agency" />
    @endsection
</head>
<body>
<header>
    <div class="container-fluid">
        <div class="mout-pub-panel" id="top-panel">
            <span class="txt-hidden">M<span>o</span></span>
            <svg class="burger" viewBox="0 0 100 100" width="80">
                <path class="burger__line top" d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40"></path>
                <path class="burger__line middle" d="m 30,50 h 40"></path>
                <path class="burger__line bottom" d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40"></path>
            </svg>
        </div>
        <div class="mout-pub-header-container">
            <h1>mout</h1>
            <h2>l’agence geek et créative</h2>
        </div>
        <div class="mout-pub-panel" id="left-panel">
            <div class="mout-pub-rs-container">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
        </div>
    </div>

    <nav class="main-nav">
        <div class="main-nav-left-container">
            <h4 class="float-left">M<span>o</span></h4>
            <div class="main-nav-content">
                <i class="fal fa-planet-ringed"></i>
                <a href="">Mout</a>
                <a href="">Services</a>
                <a href="">Réalisations</a>
                <a href="">Contact</a>
            </div>
        </div>
        <div class="main-nav-right-container">
            <div class="close">
                <i class="fal fa-times"></i>
            </div>
            <div class="main-nav-content">
                <H4>Contact</H4>
                <a href="">hello@moutwebagency.com</a>
                <a href="">+33 (6) 70 06 11 07</a>
                <p>84 rue de versailles</p>
                <p>76150 Le Chesnay</p>
            </div>
        </div>

    </nav>
</header>
@yield('body')

<footer>
    <div class="footer-left-container">
        <h4>Mout</h4>
        <div class="footer-address-container">
            <span class="galaxy"><i class="fal fa-planet-ringed"></i></span>
            <p>84, Rue de versailles - 78150 Le Chensay</p>
        </div>
        <div class="footer-mail-container">
            <a href="">hello@<span style="color: #FFFF00;">mout</span>webagency.com</a>
        </div>
        <div class="footer-phone-container">
            <a href="tel:+33670061107">+33(6) 70 06 11 07</a>
        </div>
        <div class="footer-social-networks-container">
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
    <div class="footer-right-container">
        <div class="footer-copyright-container">
            &copy;2020 - moutwebagency
        </div>
    </div>
</footer>
</body>
</html>
