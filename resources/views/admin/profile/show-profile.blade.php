@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ auth()->user()->name . ' ' . auth()->user()->lastname }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Profile
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
                                @if(!is_null(auth()->user()->profile_photo_path))
                                <img src="{{ asset('storage/images/uploads/profiles/img/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}" class="img-fluid img-client-logo">
                                @else
                                    <span class="profile-name randcolor">{{ substr(auth()->user()->lastname, 0, 1) . substr(auth()->user()->name, 0, 1) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="client-informations">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="client-informations-left">
                                        <h3 class="client-name mt-0">{{ auth()->user()->lastname . ' ' . auth()->user()->name }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="client-details">
                                        <li>
                                            <span class="title">Mail :</span>
                                            <span class="text">{{ auth()->user()->email }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Photo :</span>
                                            <span class="text">
                                                @if(!is_null(auth()->user()->profile_photo_path))
                                                    <img src="{{ asset('storage/images/uploads/profiles/img/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}" class="img-fluid img-client-logo">
                                                @else
                                                    <span class="profile-name randcolor">{{ substr(auth()->user()->lastname, 0, 1) . substr(auth()->user()->name, 0, 1) }}</span>
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">Créé le : </span>
                                            <span class="text">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
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

    <div class="edit-profile-container">
        <form action="{{ route('profileEdit') }}" method="post" class="mout-form" enctype="multipart/form-data">
            @csrf
            @include('layouts.form_errors.errors')
            <div class="row">
                <div class="col-12">
                    <input type="hidden" name="profile-id" value="{{ auth()->user()->id }}">
                    <div class="profile-img-container d-flex justify-content-center">
                        @if(!is_null(auth()->user()->profile_photo_path))
                            <div class="profile-img-content position-relative form-group">
                                <img src="{{ asset('storage/images/uploads/profiles/img/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name . ' ' . auth()->user()->lastname }}" class="img-fluid img-client-logo file-reader-img">
                                <input type="file" name="profile-img" id="profile-img" class="file-reader-input">
                                <div class="fileupload-filter">Edit</div>
                            </div>
                        @else
                            <span class="profile-name randcolor">{{ substr(auth()->user()->lastname, 0, 1) . substr(auth()->user()->name, 0, 1) }}
                                <div class="fileupload-filter">Edit</div>
                                <input type="file" name="profile-img" id="profile-img" class="file-reader-input">
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="profile-name" class="relative-label">Nom</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="profile-name" id="profile-name" aria-label="Nom" placeholder="Nom" @isset( auth()->user()->name ) value="{{ auth()->user()->name }}" @endisset>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="profile-lastname" class="relative-label">Prénom</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="profile-lastname" id="profile-lastname" aria-label="Prénom" placeholder="Prénom" @isset( auth()->user()->lastname ) value="{{ auth()->user()->lastname }}" @endisset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="profile-email" class="relative-label">Email</label>
                        <div class="input-group">
                            <input class="form-control" type="email" name="profile-email" id="profile-email" aria-label="Email" placeholder="Email" @isset( auth()->user()->email ) value="{{ auth()->user()->email }}" @endisset>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="profile-password" class="relative-label">Password</label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="profile-password" id="profile-password" aria-label="Password" placeholder="Password">
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
@endsection

@section('js')
    <script src="{{ asset('js/admin/filereader.js') }}"></script>
@endsection
