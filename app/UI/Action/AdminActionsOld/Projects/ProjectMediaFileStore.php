<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Entity\Client;
use App\Domain\Entity\Project;
use App\Domain\Repository\MediaProjectRepository;
use App\Domain\Repository\ProjectRepository;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Support\Str;

class ProjectMediaFileStore
{
    private $projectRepository;

    private $mediaProjectRepository;

    private $uploadedFilesService;

    /**
     * ProjectMediaFileStore constructor.
     * @param ProjectRepository $projectRepository
     * @param UploadedFilesService $uploadedFilesService
     * @param MediaProjectRepository $mediaProjectRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        UploadedFilesService $uploadedFilesService,
        MediaProjectRepository $mediaProjectRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->uploadedFilesService = $uploadedFilesService;
        $this->mediaProjectRepository = $mediaProjectRepository;
    }

    public function __invoke()
    {
        $project = Project::whereId(request('project-media-img-id'))->first();
        $client = Client::whereId($project->client_id)->first();
        $file = request('add-project-media-input');
        $medias = $this->mediaProjectRepository->getAllMediasByProject($project);
        $position = request('project-media-position-input');

        $this->mediaProjectRepository->removeMediaOrder($project);

        $mediaOrder = [];
        foreach ($medias as $media) {
            $mediaOrder[] = $media['mediaProjectPath'];
        }

        $this->addinarray($mediaOrder, request('media-project-order-new-img'), $file->getClientOriginalName(), $position);

        $this->mediaProjectRepository->storeAndReorganizeOrder($project, $file, $mediaOrder);

        $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . $client->slug . '/projets/' . Str::slug($project->title));

        $jsonResponse = [
            'response' => 'success',
            'url_img' =>  '/storage/images/uploads/' . $project->client->slug . '/projets/' . $project->slug . '/' . $file->getClientOriginalName(),
        ];

        return response()->json($jsonResponse);
    }

    private function addinarray(&$array,$after, $value, $position){
        $offset = array_search($after, $array);
        if ($position == 'after') {
            $index = $offset+1;
        } else {
            $index = $offset;
        }
         array_splice($array, $index, 0, $value);
    }
}
