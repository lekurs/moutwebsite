@extends('layouts.admin-layout')
@yield('title')
<title>Clients | MOUT</title>

@yield('meta')
<meta name="description" content="Vous trouverez la liste des clients de l'agence web Mout.">

@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Clients
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                <a href="{{ route('clientShowAll') }}">Clients</a>
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_client">
            <i class="fal fa-plus"></i>
            Créer un client
        </a>
    </div>
@endsection
@section('body')
    <form class="row filter-row" action="{{ route('clientSearch') }}" method="post">
        @csrf
        @include('layouts.form_errors.errors')
        <div class="col-sm-12 col-md-6">
            <div class="form-group form-focus">
                <input type="text" id="client-name" name="client-name" class="form-control floating-input" placeholder=" ">
                <label for="client-name" class="float">Nom du client</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <a href="#" class="btn btn-success btn-block text-uppercase mout--regular">Chercher</a>
        </div>
    </form>

    <div class="row">
        @foreach($clients as $client)
        @include('layouts.cards.client_card')
            {{ $clients->links() }}
        @endforeach

    </div>

<!-- Modal -->
<div class="modal fade custom-modal" id="create_client" tabindex="-1" aria-labelledby="create_client" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'un nouveau client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientAdd') }}" method="post" enctype="multipart/form-data">
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
    </div>
</div>
@endsection

@section('js')
{{--    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>--}}
{{--    <script src="{{ asset('js/admin/addcontact/addcontact.js') }}"></script>--}}
@endsection
