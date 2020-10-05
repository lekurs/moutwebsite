@extends('layouts.public_layout')

@section('title', 'Bienvenue')

@section('js')
    <script src="{{ asset('js/public/descriptions.js') }}"></script>
    <script src="{{ asset('js/public/public-navigation.js') }}"></script>
@endsection

@section('body')
    <header>
        <div class="container-fluid">
            <div class="mout-pub-panel" id="top-panel">
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
    </header>

    <section class="mout-description-section">
        <h3>mout en quelques mots</h3>
        <div class="mout-description-container">
            <span class="wording-description-container" id="wording-1">1. <i class="far fa-telescope"></i><span class="wording-description">Créatifs</span></span>
            <span class="wording-description-container" id="wording-2">2. <i class="fal fa-satellite"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-3">3. <i class="fal fa-moon-stars"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-4">4. <i class="fal fa-planet-ringed"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-5">5. <i class="fal fa-solar-system"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-6">6. <i class="fal fa-ufo"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-7">7. <i class="fal fa-comet"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-8">8. <i class="fal fa-star-shooting"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-9">9. <i class="fal fa-user-astronaut"></i><span class="wording-description">blabla</span></span>
            <span class="wording-description-container" id="wording-10">10. <i class="fal fa-starship"></i><span class="wording-description">blabla</span></span>
        </div>
    </section>

    <section class="mout-services-description">
        <h3>Services</h3>

        <div class="services-icon-container">
            @foreach($services as $service)
                <a href="#" id="{{$service->slug }}" data-service="{{ $service->slug }}">
                    <p>{{$service->libelle}}</p>
                    <i class="{{$service->icon}}"></i>
                </a>
            @endforeach
        </div>
        <div class="services-description-container">
            @foreach($services as $service)
                <div class="services-description-content" id="{{ $service->slug }}">
                    <h4 class="service-description-title">Notre expertise</h4>
                    <p>{!! $service->description !!}</p>
                    <a href="#" class="btn btn-mout">En savoir +</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mout-projects">
        <h3>Nos réalisations</h3>
        <div class="mout-projects-container">
            @foreach($projects as $project)
                <div class="mout-project-content">
                    <img src="{{ asset('storage/images/uploads/projects/' . $project->slug . '/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid project-img">
                    <a href="#" class="mout-project-description" style="background-color: {{ $project->colorProject }}">
                        <p>test</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('js')
{{--    <script src="{{ asset('js/public/descriptions.js') }}"></script>--}}
{{--    <script src="{{ asset('js/public/public-navigation.js') }}"></script>--}}
@endsection
