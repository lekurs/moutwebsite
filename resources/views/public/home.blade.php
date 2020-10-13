@extends('layouts.public_layout')

@section('title', 'Bienvenue')

@section('js')
    <script src="{{ asset('js/public/descriptions.js') }}"></script>
    <script src="{{ asset('js/public/public-navigation.js') }}"></script>
@endsection

@section('body')
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
                <a href="#" id="{{$service->slug }}" data-service="{{ $service->slug }}" class="service-link">
                    <p>{{$service->libelle}}</p>
                    <span class="service-icon" style="color: {{ $service->color_icon }}">{!! $service->icon !!}</span>
                </a>
            @endforeach
        </div>
        <div class="services-description-container">
            @foreach($services as $service)
                <div class="services-description-content" id="{{ $service->slug }}">
                    <h4 class="service-description-title">Notre expertise</h4>
                    <p>{!! $service->description !!}</p>
                    @foreach($service->projects as $project)
                        <p>{{ $project->title }}</p>
                    @endforeach
                    <a href="#" class="btn btn-mout">En savoir +</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mout-projects">
        <h3>Nos derniers projets</h3>
        <div class="mout-projects-container">
            @foreach($projects as $project)
                <div class="mout-project-content">
                    <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid project-img">
                    <a href="#" class="mout-project-description" style="background-color: {{ $project->colorProject }}">
                        <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/logo/' . $project->client->logo) }}" alt="{{ $project->client->slug }}">
                        <p class="project-title">{{ $project->title }}</p>
                        <span class="project-description">{!! $project->result !!}</span>
                        <button class="project-button">Voir le projet +</button>
                    </a>
                </div>
            @endforeach
        <a href="#" class="projects-plus">
            <span class="projects-plus">Voir + de réalisations</span>
        </a>
        </div>
        <div class="end-section-container">

        </div>
    </section>

    <section class="mout-contact">
        <h3>Un nouveau projet ?</h3>
        <a href="" class="btn btn-contact">
            <span>Contactez-nous</span>
        </a>
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
    </section>
@endsection

@section('js')
{{--    <script src="{{ asset('js/public/descriptions.js') }}"></script>--}}
{{--    <script src="{{ asset('js/public/public-navigation.js') }}"></script>--}}
@endsection
