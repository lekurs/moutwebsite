<div class="col-12">
    <table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="skills">
        <thead>
        <tr>
            <th>#</th>
            <th>Numéro</th>
            <th>Intitulé</th>
            <th>Total HT</th>
            <th>Validation</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($client->estimations as $estimation)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="#">{{ $estimation->reference }}</a></td>
            <td><a href="#">{{ $estimation->title }}</a></td>
            <td><a href="#">{{ $estimation->totalnotax }} €</a></td>
            <td>
                <div class="dropdown-mout dropdown-mout-table">
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o @if($estimation->validation == 1) text-success @else text-danger @endif"></i> @if($estimation->validation == 1)Validé @else En cours @endif
                    </a>
                    <div class="dropdown-menu-mout dropdown-menu-mout-table dropdown-mout-status" x-placement="bottom-end" style="position: absolute; transform: translate3d(-17px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="{{ route('skillStatus', $estimation->id) }}"><i class="fa fa-dot-circle-o text-success"></i> Validé</a>
                        <a class="dropdown-item" href="{{ route('skillStatus', $estimation->id) }}"><i class="fa fa-dot-circle-o text-danger"></i> En cours</a>
                    </div>
                </div>
            </td>
            <td class="text-right">
                <div class="dropdown-mout dropdown-mout-table dropdown-mout-status">
                    <a href="#" class="dropdown-icon">
                        <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu-mout dropdown-menu-mout-table">
                        <a class="dropdown-item" href="{{ route('estimationShowOne', ['clientSlug' => $client->slug, 'estimationId' => $estimation->id]) }}" data-id="{{ $estimation->id }}"><i class="fal fa-eye"></i> Voir</a>
                        <a class="dropdown-item" href="{{ route('skillShowOne', $estimation->id) }}" data-id="{{ $estimation->id }}"><i class="fal fa-pen"></i> Modifier</a>
                        <a class="dropdown-item" href="{{ route('skillDelete', $estimation->id) }}" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
                        <a class="dropdown-item" href="{{ route('estimationCreationPDF', [$client->slug, $estimation->id]) }}" target="_blank" data-id=""><i class="fal fa-file-pdf"></i> Voir le PDF</a>
                        <a class="dropdown-item" href="{{ route('skillDelete', $estimation->id) }}" data-id=""><i class="fal fa-envelope"></i> Envoyer par mail</a>
                    </div>
                </div>
            </td>
        </tr>
        @empty
            <tr>
                <td>Aucun devis en cours</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
