<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
    <div class="card">
        <div class="card-body">
            <div class="dropdown-mout">
                <div class="dropdown-icon">
                    <i class="fal fa-ellipsis-v"></i>
                </div>
                <div class="dropdown-menu-mout">
                    <a class="dropdown-item" href="#" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                    <a class="dropdown-item" href="#" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
                </div>
            </div>
            <h4 class="project-title">{{ $project->title }}</h4>
            <small class="block m-b-15">
                <span class="bolder">Conseil</span> | <span class="bolder">Création</span> | <span class="bolder">Web</span></small>
            <p class="text-muted">{!! $project->result !!}</p>
            <div class="end-project">
                <p class="subtitle">Fin de projet :</p>
                <p class="text-muted">{{ date('d/m/Y', strtotime($project->endProject)) }}</p>
            </div>
            <div class="img-portfolio-container">
                <p class="subtitle">Image de présentation :</p>
                <img src="{{ asset('storage/images/uploads/'. $project->client->slug . '/projects/jardiquiz-portfolio.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
