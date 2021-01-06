@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Contact
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                <a href="{{ route('clientShowOne', $contact->client->slug) }}">Client</a> / Contact / Editer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('contactEditStore', $contact->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <input type="hidden" value="{{ $contact->slug }}" name="contact-slug" id="contact-slug">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title"><i class="fal fa-user"></i> {{ $contact->lastname }} {{ $contact->name }}</h5>
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
