<div class="col-md-4 col-sm-6 col-12">
    <div class="contact-card-container">
        <div class="contact-img-container mb-2">
            <a href="{{ route('clientShowOne', $contact->slug) }}">
                @if(!is_null($contact->picture_path))
                <img src="{{ asset('storage/images/uploads/' . $client->slug . '/' . $contact->slug . '/picture/' . $contact->picture_path) }}" alt="" class="img-fluid contact-img">
                @else
                <span class="contact-name" style="background-color:{{ $color }} ">{{ substr($contact->lastname, 0, 1) . substr($contact->name, 0, 1) }}</span>
                    @endif
            </a>
        </div>
        <div class="dropdown-mout">
            <div class="dropdown-icon">
                <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
            </div>
            <div class="dropdown-menu-mout">
                <a class="dropdown-item" href="{{ route('clientEditForm', $contact->slug) }}" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                <a class="dropdown-item" href="#" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
            </div>
        </div>
        <a href="{{ route('clientShowOne', $contact->slug) }}">
            <h4 class="contact-name">{{ $contact->lastname . ' ' .$contact->name }}</h4>
        </a>
        <a href="{{ route('clientShowOne', $contact->slug) }}">
            <h5 class="contact-total-projects">{{ $contact->email }}</h5>
        </a>
        <a href="{{ route('clientShowOne', $contact->slug) }}">
            <div class="small text-muted client-total-ca">{{ $contact->contact_function }}</div>
        </a>

        <a href="{{ route('clientShowOne', $contact->slug) }}" class="btn btn-white mt-3">Voir le contact</a>
    </div>
</div>
