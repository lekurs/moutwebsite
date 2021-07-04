<div class="col-12">
    <table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="skills">
        <thead>
        <tr>
            <th>#</th>
            <th>Numéro</th>
            <th>Intitulé</th>
            <th>Total HT</th>
            <th>Solde</th>
            <th>Validation</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse($estimations as $estimation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="#">{{ $estimation['estimation']->year . $estimation['estimation']->month . $estimation['estimation']->reference }}</a></td>
                <td><a href="#">{{ $estimation['estimation']->title }}</a></td>
                <td><a href="#">{{ $estimation['total_row'] }}</a></td>
                <td>{{ $estimation['total_row'] - $estimation['total_invoices'] }}</td>
                <td>
                    <div class="dropdown-mout dropdown-mout-table">
                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o @if( $estimation['total_row'] != $estimation['total_invoices']) text-danger @else text-success @endif"></i> @if( $estimation['total_row'] != $estimation['total_invoices']) En cours @else Terminé @endif
                        </a>
                        <div class="dropdown-menu-mout dropdown-menu-mout-table dropdown-mout-status" x-placement="bottom-end" style="position: absolute; transform: translate3d(-17px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{ route('skills.status', $estimation['estimation']->id) }}"><i class="fa fa-dot-circle-o text-success"></i> Validé</a>
                            <a class="dropdown-item" href="{{ route('skills.status', $estimation['estimation']->id) }}"><i class="fa fa-dot-circle-o text-info"></i> En cours</a>
                            <a class="dropdown-item" href="{{ route('skills.status', $estimation['estimation']->id) }}"><i class="fa fa-dot-circle-o text-danger"></i> Terminé</a>
                        </div>
                    </div>
                </td>
                <td class="text-right">
                    <div class="dropdown-mout dropdown-mout-table dropdown-mout-status">
                        <a href="#" class="dropdown-icon">
                            <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu-mout dropdown-menu-mout-table">
                            <a class="dropdown-item" href="{{ route('estimations.show', [$client->slug, $estimation['estimation']->id]) }}" data-id="{{ $estimation['estimation']->id }}"><i class="fal fa-pen"></i> Modifier</a>
                            <a class="dropdown-item" href="{{ route('estimations.destroy', [$client->slug, $estimation['estimation']->id]) }}" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
                            <a class="dropdown-item" href="{{ route('estimations.create.pdf', [$client->slug, $estimation['estimation']->id]) }}" target="_blank" data-id=""><i class="fal fa-file-pdf"></i> Voir le PDF</a>
                                @if( $estimation['total_row'] != $estimation['total_invoices'])
                                    <a class="dropdown-item" href="{{ route('invoices.create', $estimation['estimation']->id) }}"><i class="fal fa-file-invoice-dollar"></i> Créer une facture</a>
                                    @forelse($estimation['invoices'] as $invoice)
                                    <a class="dropdown-item" href="{{ route('invoices.create.pdf', $invoice->id) }}" target="_blank"><i class="fal fa-file-invoice-dollar"></i> Voir la facture d'acompte {{ $invoice->reference }}</a>
                                @empty
                                        @endforelse
                                    @else
                                        @forelse( $estimation['invoices'] as $invoice)
                                    <a class="dropdown-item" href="{{ route('invoices.create.pdf', $invoice->id) }}" target="_blank"><i class="fal fa-file-invoice-dollar"></i> Voir la facture</a>
                                    @empty
                                    @endforelse
                                @endif
                            <a class="dropdown-item" href="{{ route('skills.destroy', $estimation['estimation']->id) }}" data-id=""><i class="fal fa-envelope"></i> Envoyer par mail</a>
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
