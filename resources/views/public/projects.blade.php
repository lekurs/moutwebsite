@extends('layouts.public_layout')

@section('title', 'Bienvenue')

@section('js')
    <script>
        $(document).ready(function() {

            $('a.service-link').on('click', function () {
                let project = $('.project-container');
                let filter = $(this).attr('data-service');
                let newColor = $(this).attr('data-color');

                $('.service-link').css('color', '#000');
                $(this).css('color', newColor);

                if(filter === "all") {
                    project.show(500);
                } else {
                    project.hide(500);
                    $('.' + filter).show(500);
                }
            });

        });
    </script>
@endsection

@section('body')
    <div class="mout-pub-panel" id="left-panel">
        <div class="mout-pub-rs-container">
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-facebook-f"></i>
        </div>
    </div>
    <section class="mout-services-description">
        <h3>Réalisations</h3>
        <div class="services-icon-container">
            <a href="#" id="tout" data-service="all" class="service-link active" data-color="#D90000" style="color: #D90000">
                <p>Tout voir</p>
                <span class="service-icon" style="color: #D90000"><i class="fal fa-planet-ringed" style="color: #D90000"></i></span>
            </a>
            @foreach($services as $service)
                <a href="#" id="{{$service->slug }}" data-service="{{ $service->slug }}" data-color="{{ $service->color_icon }}" class="service-link">
                    <p>{{$service->libelle}}</p>
                    <span class="service-icon" style="color: {{ $service->color_icon }}">{!! $service->icon !!}</span>
                </a>
            @endforeach
        </div>
    </section>
    <section class="container projects-container">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-12 md-4 col-lg-4 mb-4 project-container {{ $project->id }} @foreach($project->services as $service){{$service->slug}} @endforeach">
                        <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid project-img">
                    <a href="{{ route('project', $project->slug) }}" style="background-color: {{ $project->colorProject }}">
                        <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/logo/' . $project->client->logo) }}" alt="{{ $project->client->slug }}">
                        <p class="project-title">{{ $project->title }}</p>
                        <span class="project-description">
                            @foreach($project->skills as $skill)
                                {{ $skill->skill }} <br>
                            @endforeach
                        </span>
                        <button class="project-button">Voir le projet +</button>
                    </a>
                </div>
                {{ $projects->links() }}
            @endforeach
        </div>
    </section>
@endsection
