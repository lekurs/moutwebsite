<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ProjectRepository;
use App\Http\Requests\StoreProject;
use App\Services\Uploads\UploadedFilesService;
use App\UI\Responder\Admin\Projects\ProjectCreationResponder;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProjectCreationAction
{
    private $projectRepository;

    private $uploadedFilesService;

    private $clientRepository;

    /**
     * ProjectCreationAction constructor.
     * @param ProjectRepository $projectRepository
     * @param UploadedFilesService $uploadedFilesService
     * @param ClientRepository $clientRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        UploadedFilesService $uploadedFilesService,
        ClientRepository $clientRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->uploadedFilesService = $uploadedFilesService;
        $this->clientRepository = $clientRepository;
    }

    public function __invoke(StoreProject $storeProject, ProjectCreationResponder $responder): RedirectResponse
    {
        $client = $this->clientRepository->getOneById($storeProject['client-id']);

        $this->projectRepository->store($storeProject->all());

        if(isset($storeProject['image']) && !is_null($storeProject['image'])) {
            foreach($storeProject['image'] as $uploadedImg) {
                $this->uploadedFilesService->moveFile($uploadedImg, '/public/images/uploads/' . $client->slug . '/projets/' . Str::slug($storeProject['project-title']));
            }
        }

        if(isset($storeProject['project-img-portfolio']) && !is_null($storeProject['project-img-portfolio'])) {
            $this->uploadedFilesService->moveFile($storeProject['project-img-portfolio'], '/public/images/uploads/' . $client->slug . '/projets/portfolio');
        }

        if(isset($storeProject['project-background-img']) && !is_null($storeProject['project-background-img'])) {
            $this->uploadedFilesService->moveFile($storeProject['project-background-img'], '/public/images/uploads/' . $client->slug . '/projets/portfolio');
        }

        return $responder($client);
    }
}
