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
                Projet / {{ $projet->slug }} / Recettes
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
                @foreach( $project->recipes as $recipe)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $recipe->label }}</td>
{{--                        <td>{{ $recipe-> }}</td>--}}
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('js')

@endsection
