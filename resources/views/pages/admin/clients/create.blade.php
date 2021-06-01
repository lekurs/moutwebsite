@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Client
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Client / Créer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title">Société</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-client">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="client-name" class="relative-label">Nom du client</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="client-name" id="client-name" aria-label="Nom du client" placeholder="Nom du client">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="client-phone" class="relative-label">Téléphone</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="client-phone" id="client-phone" aria-label="Téléphone" placeholder="Téléphone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="client-address" class="relative-label">Adresse</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="client-address" id="client-address" aria-label="Adresse du client" placeholder="Adresse du client">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="client-zip" class="relative-label">Code Postal</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="client-zip" id="client-zip" aria-label="Code postal" placeholder="Code postal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="client-city" class="relative-label">Ville</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="client-city" id="client-city" aria-label="Ville" placeholder="Ville">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="client-siren" class="relative-label">N° Siren</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="client-siren" id="client-siren" aria-label="Siren" placeholder="Siren">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="client-logo" class="relative-label">Logo</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="client-logo" id="client-logo" aria-label="Logo" placeholder="Logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-primary add-btn">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
