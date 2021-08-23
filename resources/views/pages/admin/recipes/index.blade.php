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
                Projet / {{ $project->slug }} / Recettes
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="skills">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Intitulé</th>
                    <th>Enregistré par</th>
                    <th>Date de création</th>
                    <th>Mise à jour Dev</th>
                    <th>Mise à jour Client</th>
                    <th>Validée Client</th>
                    <th>Validée Dev</th>
                    <th>Cloturer</th>
                </tr>
                </thead>
                @forelse($recipes as $recipe)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->label }}</a></td>
                        <td>{{ $recipe->user->name }}</td>
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->created_at }}</a></td>
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->update_dev }}</a></td>
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->update_customer }}</a></td>
                        <td>{{ $recipe->validation_customer }}</td>
                        <td>{{ $recipe->validation_dev }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input project_progression" id="project_active" name="project_active" data-slug="{{ $project->slug }}" value="{{ $project->in_progress }}" @if($project->in_progress > 0) checked @endif>
                                <label class="custom-control-label" for="project_active">Projet @if($project->in_progress > 0)actif @else inactif @endif</label>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Aucune recette créée</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="9"><a href="{{ route('recipes.gerer.create', $project->slug) }}" class="btn add-btn">Créer une recette</a></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('js')

@endsection
