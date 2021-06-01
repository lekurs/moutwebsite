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
                <a href="{{ route('clients.store') }}">Clients</a>
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="{{ route('clients.create') }}" class="btn add-btn">
            <i class="fal fa-plus"></i>
            Créer un client
        </a>
    </div>
@endsection
@section('body')
    <form class="row filter-row" action="{{ route('clients.search') }}" method="post">
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
@endsection

