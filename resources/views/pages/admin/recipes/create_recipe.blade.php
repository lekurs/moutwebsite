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
                Recette / Gérer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('recipes.store', $project->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <div class="row">
                    <div class="col-12">
                        <H6>Selectionner la page concernée</H6>
                    </div>
                    @forelse($pages as $page)
                        <div class="col">
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

                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title">Création d'une recette client</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <H6 class="add-client-title">Sélectionnez le device concerné</H6>
                    </div>
                </div>
                <div class="row">
                    @foreach($devices as $device)
                        <div class="col">
                            <label for="device_id">
                                <input type="radio" name="device_id" value="{{ $device->id }}" class="custom-radio">
                                {{ $device->libelle }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 col-client">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="recipe_label" class="relative-label">Libellé de la recette</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="recipe_label" id="recipe_label" aria-label="Libellé de la recette" placeholder="Libellé de la recette">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea name="recipe_description" id="recipe_description" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="recipe_image" class="relative-label">Insérer une image</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="recipe_image" id="recipe_image" aria-label="Téléphone" placeholder="Téléphone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-primary add-btn">Créer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#recipe_description').summernote({
            placeholder: 'Decrivez votre recette',
            height: 150,
            width: '100%'
        });
    </script>
@endsection
