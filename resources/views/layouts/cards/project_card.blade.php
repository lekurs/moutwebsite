<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
    <div class="card">
        <div class="card-body">
            <div class="dropdown-mout">
                <div class="dropdown-icon">
                    <i class="fal fa-ellipsis-v"></i>
                </div>
                <div class="dropdown-menu-mout">
                    <a class="dropdown-item" href="{{ route('projectEditForm', $project->slug) }}" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                    <a class="dropdown-item" href="#" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
                </div>
            </div>
            <h4 class="project-title">{{ $project->title }}</h4>
            <small class="block m-b-15">
                @foreach($project->services as $service)
                    <span class="bolder">{{ $service->libelle }} @if(!$loop->last)|@endif</span>
                @endforeach
            </small>
            <p class="text-muted">{!! substr ($project->result, 0, 300) . '...' !!}</p>
            <div class="end-project">
                <p class="subtitle">Fin de projet :</p>
                <p class="text-muted">{{ date('d/m/Y', strtotime($project->endProject)) }}</p>
            </div>
            <div class="img-portfolio-container">
                <p class="subtitle">Image de présentation :</p>
                <img src="{{ asset('storage/images/uploads/'. $project->client->slug . '/projets/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
