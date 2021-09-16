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
                Recette / Page / Créer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('pages.store', $project->slug) }}" method="post">
                @csrf
                @include('layouts.form_errors.errors')
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title">Création d'une page</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-client">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="page_label" class="relative-label">Intitulé de la page</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="page_label" id="page_label" aria-label="Intitulé de la page" placeholder="Initulé de la page">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="page_url_path" class="relative-label">URL de la page</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="page_url_path" id="page_url_path" aria-label="URL de la page" placeholder="URL de la page">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <H6 class="add-client-title">Sélectionnez les contacts concernés</H6>
                    </div>
                </div>
                <div class="row">
                    @foreach($project->client->users as $contact)
                        <div class="col">
                            <label for="contact_id">
                                <input type="checkbox" name="contact_id" value="{{ $contact->id }}">
                                {{ $contact->lastname }} {{ $contact->name }}
                            </label>
                        </div>
                    @endforeach
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

@endsection
