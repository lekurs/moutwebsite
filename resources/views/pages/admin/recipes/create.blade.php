@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Recettes
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Recette / Administrer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <H6>Selectionner la page concernée</H6>
                </div>
                @forelse($pages as $page)
                    <div class="col-12">
                        <input type="radio" name="recipe_page_id" value="{{ $page->id }}" id="recipe_page_id">
                        <label for="recipe_page_id"><i class="far fa-file"></i> {{ $page->label }}</label>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Pas de page créée</p>
                    </div>
                @endforelse
                <div class="col-12">
                    <a href="{{ route('pages.create', $project->slug) }}" class="btn add-btn float-left my-2">Créer une page</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input project_progression" id="project_active" name="project_active" data-slug="{{ $project->slug }}" value="{{ $project->in_progress }}" @if($project->in_progress > 0) checked @endif>
                        <label class="custom-control-label" for="project_active">Projet @if($project->in_progress > 0)actif @else inactif @endif</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.project_progression').on('click', function () {
                project = $(this).data('slug');
                $.post({
                    url: '{{ route('projects.update.active') }}',
                    data: {slug: project},
                });
            });
        });
    </script>
@endsection
