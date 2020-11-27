@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Projets
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Projets
            </li>
        </ul>
    </div>
@endsection
@section('body')
<div class="row edit-client-form-container">
    <div class="col-12">
        <form action="{{ route('clientEditStore', $client->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('layouts.form_errors.errors')
            <input type="hidden" value="{{ $client->slug }}" name="client-slug" id="client-slug">
            <div class="row">
                <div class="col-12 text-center">
                    <h5 class="add-client-title"><i class="fal fa-building"></i> {{ $client->name }}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-client">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="client-name" class="relative-label">Nom du client</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="client-name" id="client-name" aria-label="Nom du client" placeholder="Nom du client" @isset($client) value="{{ $client->name }}" @endisset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="client-phone" class="relative-label">Téléphone</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="client-phone" id="client-phone" aria-label="Téléphone" placeholder="Téléphone" @isset($client) value="{{ $client->phone }}" @endisset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="client-address" class="relative-label">Adresse</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="client-address" id="client-address" aria-label="Adresse du client" placeholder="Adresse du client" @isset($client) value="{{ $client->address }}" @endisset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="client-zip" class="relative-label">Code Postal</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="client-zip" id="client-zip" aria-label="Code postal" placeholder="Code postal" @isset($client) value="{{ $client->zip }}" @endisset>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="client-city" class="relative-label">Ville</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="client-city" id="client-city" aria-label="Ville" placeholder="Ville" @isset($client) value="{{ $client->city }}" @endisset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="client-siren" class="relative-label">N° Siren</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="client-siren" id="client-siren" aria-label="Siren" placeholder="Siren" @isset($client) value="{{ $client->siren }}" @endisset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="client-logo" class="relative-label">Logo</label>
                                <div class="input-group">
                                    @isset($client)
                                        <img src="{{ asset('storage/images/uploads/' . $client->slug . '/logo/' . $client->logo) }}" alt="{{ $client->name }}" class="img-fluid logo-client">
                                        <input class="form-control input-file-hidden" type="file" name="client-logo" id="client-logo" aria-label="Logo" placeholder="Logo">
                                    @else
                                        <input class="form-control" type="file" name="client-logo" id="client-logo" aria-label="Logo" placeholder="Logo">
                                    @endisset
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
    <script>
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('img.logo-client').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $(".input-file-hidden").on('change', function() {
                readURL(this);
            });
        });
    </script>
@endsection
