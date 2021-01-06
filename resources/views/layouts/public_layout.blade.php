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
    <script src="{{ asset('js/public/public-navigation.js') }}"></script>

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
    </div>
    <nav class="main-nav">
        <div class="main-nav-left-container">
            <h4 class="float-left">M<span>o</span></h4>
            <div class="main-nav-content">
                <i class="fal fa-planet-ringed"></i>
                <a href="">Mout</a>
                <a href="">Services</a>
                <a href="{{ route('projets') }}">Réalisations</a>
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

<section class="mout-contact">
    <h3>Un nouveau projet ?</h3>
    <span class="btn btn-contact btn-open-contact-form">
        <span>Contactez-nous</span>
    </span>
    <div class="svg-container text-center">
        <svg version="1.1" id="mout-fusee-black-contact" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 166 126" style="enable-background:new 0 0 166 126;" xml:space="preserve">
                    <style type="text/css">
                        .st0-mout-fusee-black-contact{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                        .st1-mout-fusee-black-contact{fill:#FFFF00;}
                    </style>
            <path class="st0-mout-fusee-black-contact" d="M70.5,42.8c0,1.8,0.2,8.5,0.2,10.2c0,1.7,0.9,3.5,1.9,4.7c0.3,0.3,3.7,3.5,3.7,3.5C72.4,78,85.8,89.5,86.3,90
	c0.6-0.6,14-12.7,8.5-28.7l1.7-1.6c0,0,1.6-1.5,1.8-1.8c1.2-1.3,1.8-3,1.9-4.8c0.1-1.8,0-10.3,0-10.3S98.6,43,98.4,43
	c-0.1,0.1-1.5,3.6-2.7,4.8c-0.7,0.8-5.6,4.4-5.6,4.4c-0.7-1.1-1.6-2.1-2.4-3.1C87.7,49,87.6,49,87.4,49c-1.6,0.1-3.2,0.1-4.8,0.1
	c-0.2,0-0.3,0.1-0.4,0.2c-0.5,0.7-1.7,2.7-1.8,2.9c-0.4-0.1-4.7-3.3-5.5-4.2s-2.3-4.5-2.4-4.6C72.3,43.3,70.5,42.8,70.5,42.8z
	 M86.1,68.9c2.2-0.1,4,1.6,4.2,3.9c0.1,2.2-1.6,4-3.9,4.2c-2.2,0.1-4.1-1.7-4.2-3.9C82.2,70.8,83.8,69,86.1,68.9z"></path>
            <g id="fumee_mout_black" class="mout-fumees">
                <path class="st1-mout-fusee-black-contact" d="M81.4,35.7c1.4,0.4,2.4,1.7,2.7,3.3c0.4-0.2,0.2-3.1-0.7-4.4c1.2,0.1,4.1,3.6,3.8,4.9c0.4-0.2,1-2.7,0.8-3.5
		c0.1,0.1,2,1.1,2.1,4.6c0.1,3.9-2.2,5.1-2.4,5.3c0.1-0.2,0.2-1.6-0.5-2.1c-0.7-0.5-0.4-1.5-0.4-1.5c-0.4,0.2-0.5,0.5-0.5,0.9
		c-0.7-0.2-0.8-1.3-0.2-2.1c-0.8,0.1-1.3,1.3-1.1,2.5c-0.3-0.1-0.8-0.6-0.6-0.9c-0.6,0.9-0.9,2.2,0,3.4c-0.5-0.1-2.8-1.4-3-3.9
		s1-3,1.1-4.3C82.6,37.1,81.4,35.7,81.4,35.7z"></path>
            </g>
                </svg>
    </div>

    @include('public.contact')
</section>

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

<script>
    $('.btn.btn-open-contact-form').on('click', function() {
        console.log($(this).closest('.mout-contact').find('svg'));
        $(this).closest('.mout-contact').addClass('active');

        // $(this).closest('.mout-contact').find('svg').css('transform', 'rotate(0deg)');
        // $(this).closest('.mout-contact').find('.contact-form').addClass('active');
        $('.contact-form').show(500);
    });
</script>
</body>
</html>
