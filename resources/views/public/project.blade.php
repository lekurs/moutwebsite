@extends('layouts.public_layout')

@section('title', 'Bienvenue')

@section('js')

@endsection

@section('body')
    <div class="mout-pub-panel" id="left-panel">
        <div class="mout-pub-rs-container" id="project-page">
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-facebook-f"></i>
        </div>
    </div>

    <section class="mout-project-section">
        <div class="project-header" style="background: url('{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}') center center no-repeat; ">
            <span class="background-opacity">
                <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/logo/' . $project->client->logo) }}" alt="{{ $project->client->name }}">
                <h1 class="title-project">{{ $project->title }}</h1>
            </span>
        </div>

        <div class="project-description-container">
            <div class="project-mission-content" id="description">
                <h2 class="mission">Notre mission</h2>
                <div class="mission-description">
                    {!! $project->mission !!}
                </div>
            </div>

            <div class="project-mission-content" id="result">
                <div class="mission-result">
                    <H2 class="result-mission">le résultat</H2>
                    <div class="result-mission">
                        {!! $project->result !!}
                    </div>
                </div>
            </div>

            div.project-mission-content#
        </div>
{{--        </div>--}}
    </section>
@endsection