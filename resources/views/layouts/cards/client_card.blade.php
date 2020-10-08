<div class="col-md-4 col-sm-6 col-12">
    <div class="client-card-container">
        <div class="client-img-container">
            <a href="{{ route('clientShowOne', $client->slug) }}">
                <img src="{{ asset('storage/images/uploads/' . $client->slug . '/logo/' . $client->logo) }}" alt="" class="img-fluid client-img">
            </a>
        </div>
        <div class="dropdown-mout">
            <div class="dropdown-icon">
                <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
            </div>
            <div class="dropdown-menu-mout">
                <a class="dropdown-item" href="{{ route('clientEditForm', $client->slug) }}" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                <a class="dropdown-item" href="#" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
            </div>
        </div>
        <a href="{{ route('clientShowOne', $client->slug) }}">
            <h4 class="client-name">{{ $client->name }}</h4>
        </a>
        <a href="{{ route('clientShowOne', $client->slug) }}">
            <h5 class="client-total-projects">Nombre total de projets réalisés</h5>
        </a>
        <a href="{{ route('clientShowOne', $client->slug) }}">
            <div class="small text-muted client-total-ca">CA Total sur l'année</div>
        </a>

        <a href="{{ route('clientShowOne', $client->slug) }}" class="btn btn-white">Voir le client</a>
    </div>
</div>
