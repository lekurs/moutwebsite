<table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="skills">
    <thead>
    <tr>
        <th>#</th>
        <th>Image</th>
        <th>Titre</th>
        <th>Administrer / Gérer</th>
    </tr>
    </thead>
@foreach($client->projects as $project)
        @if ( $project->in_progress === 1)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/images/uploads/'. $project->client->slug . '/projets/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid" style="width: 80px; height: 80px; object-fit: cover;"></td>
                <td>{{ $project->title }}</td>
                <td><a href="{{ route('recipes.create', $project->slug) }}">Administrer</a> / <a href="">Gérer</a></td>

            </tr>
        @else
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/images/uploads/'. $project->client->slug . '/projets/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid w-25"></td>
                <td>{{ $project->title }}</td>
                <td>Clos</td>

            </tr>
        @endif
@endforeach
</table>
