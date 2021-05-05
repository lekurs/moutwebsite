@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $contact->name }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Contact / {{ $contact->name }} {{ $contact->lastname }}
            </li>
        </ul>
    </div>
@endsection

@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="client-view">
                        <div class="client-img-wrap">
                            <div class="client-logo">
                                <img src="{{ asset('storage/images/uploads/' . $contact->client->slug . '/' . $contact->slug . '/' . '/picture/' . $contact->picture_path) }}" alt="{{ $contact->name }}" class="img-fluid img-client-logo">
                            </div>
                        </div>
                        <div class="client-informations">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="client-informations-left">
                                        <h3 class="client-name mt-0">{{ $contact->name }} {{ $contact->lastname }}</h3>
                                        <small class="text-muted">{{ $contact->client->name }}</small>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="client-details">
                                        <li>
                                            <span class="title">Téléphone :</span>
                                            <span class="text">{{ $contact->phone }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Email :</span>
                                            <span class="text">{{ $contact->email }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Fonction :</span>
                                            <span class="text">{{ $contact->contact_function }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row edit-client-form-container no-gutters mt-3">
        <div class="col-12">
            <form action="{{ route('contacts.update', $contact->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <input type="hidden" value="{{ $contact->slug }}" name="contact-slug" id="contact-slug">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title"><i class="fal fa-pen"></i> Mise à jour de : {{ $contact->lastname }} {{ $contact->name }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-client">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contact-lastname" class="relative-label">Prénom du contact</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="contact-lastname" id="client-lastname" aria-label="Prénom du contact" placeholder="Prénom du contact" @isset($contact) value="{{ $contact->lastname }}" @endisset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contact-name" class="relative-label">Nom du contact</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="contact-name" id="client-name" aria-label="Nom du contact" placeholder="Nom du contact" @isset($contact) value="{{ $contact->name }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="contact-phone" class="relative-label">Téléphone</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="contact-phone" id="contact-phone" aria-label="Téléphone" placeholder="Téléphone" @isset($contact) value="{{ $contact->phone }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="contact-email" class="relative-label">Email</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="contact-email" id="contact-email" aria-label="Email du contact" placeholder="Email du contact" @isset($contact) value="{{ $contact->email }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="contact-function" class="relative-label">Fonction</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="contact-function" id="contact-function" aria-label="Fonction du contact" placeholder="Fonction du contact" @isset($contact) value="{{ $contact->contact_function }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="client-logo" class="relative-label">Photo de profil</label>
                                    <div class="input-group">
                                        @isset($contact)
                                            <img src="{{ asset('storage/images/uploads/' . $contact->client->slug . '/' . \Illuminate\Support\Str::slug($contact->name . '-' . $contact->lastname) . '/picture/' . $contact->picture_path) }}" alt="{{ $contact->name }} {{ $contact->lastname }}" class="img-fluid logo-client">
                                            <input class="form-control input-file-hidden" type="file" name="contact-picture" id="contact-picture" aria-label="Photo de profil" placeholder="Photo de profil">
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

@endsection
