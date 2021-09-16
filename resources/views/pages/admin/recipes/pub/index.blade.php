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
                 Recettes
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
                    <th>Nombre de commentaires</th>
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
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->created_at->format('d/m/Y') }}</a></td>
                        <td>{{ count($recipe->recipeDetails) }}</td>
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">@if(!is_null($recipe->update_dev)){{ date('d/m/Y', strtotime($recipe->update_dev)) }}@endif</a></td>
                        <td><a href="{{ route('recipes.show', $recipe->slug) }}">@if(!is_null($recipe->update_customer)){{ date('d/m/Y', strtotime($recipe->update_customer)) }}@endif</a></td>
                        <td>{{ $recipe->validation_customer }}</td>
                        <td>{{ $recipe->validation_dev }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input project_progression" id="project_active" name="project_active" data-slug="{{ $recipe->slug }}" value="{{ $recipe->status }}" @if( $recipe->status > 0) checked @endif>
                                <label class="custom-control-label" for="project_active">@if($recipe->status > 0)<span class="font-weight-bold">En cours</span> @else Terminée @endif</label>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Aucune recette créée</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection

@section('js')

@endsection
