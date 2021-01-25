@extends('layouts.public_layout')

@section('title', 'Bienvenue')

@section('js')
    <script src="{{ asset('js/public/descriptions.js') }}"></script>
    <script>
        $(document).ready(function() {
            let link = $('a.service-link');
            link.on('mouseover', function () {
                $(this).css('color', $(this).attr('data-color'));
            });

            link.on('mouseout', function () {
                $(this).css('color', '#000')
            })
        })
    </script>
@endsection

@section('body')
    <section>
        <div class="container-fluid">
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
    </section>
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
                <a href="#" id="{{$service->slug }}" data-service="{{ $service->slug }}" data-color="{{ $service->color_icon }}" class="service-link">
                    <p>{{$service->libelle}}</p>
                    <span class="service-icon" style="color: {{ $service->color_icon }}">{!! $service->icon !!}</span>
                </a>
            @endforeach
        </div>
        <div class="services-description-container">
            @foreach($services as $service)
                <div class="services-description-content" id="{{ $service->slug }}">
                    <div class="services-description-content-left" style="background-color: {{ $service->color_icon }}">
                        <div class="icon-container">
                            {!! $service->icon !!}
                        </div>
                        <h4>{{ $service->libelle }}</h4>
                        {!! $service->description !!}
                    </div>
                    <div class="services-description-content-right">
                        <h4 class="service-description-title">Notre expertise</h4>
                        <p>{!! $service->expertise !!}</p>

                        <div class="last-three-projects row mb-4">
                            @foreach($service->projects as $project)
                                <div class="mout-project-content col-12 col-md-4">
                                    <a href="{{ route('project', $project->slug) }}">
                                        <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid project-img">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('projets') }}" class="btn btn-mout show-more">Voir nos réalisations</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mout-projects">
        <h3>Nos derniers projets</h3>
        <div class="row projects-container">
            @foreach($projects as $project)
                <div class="col-12 md-4 col-lg-4 mb-4 project-container @foreach($project->services as $service){{$service->slug}} @endforeach">
                    <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid project-img">
                    <a href="#" style="background-color: {{ $project->colorProject }}">
                        <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/logo/' . $project->client->logo) }}" alt="{{ $project->client->slug }}">
                        <p class="project-title">{{ $project->title }}</p>
                        <span class="project-description">{!! $project->result !!}</span>
                        <button class="project-button">Voir le projet +</button>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="link-container">
            <a href="{{ route('projets') }}" class="projects-plus">
                <span class="projects-plus">Voir + de réalisations</span>
            </a>
        </div>
        <div class="end-section-container">

        </div>
    </section>
@endsection
