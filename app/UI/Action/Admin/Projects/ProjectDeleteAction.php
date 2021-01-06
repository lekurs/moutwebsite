<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;

class ProjectDeleteAction
{
    private ProjectRepository $projectRepository;

    /**
     * ProjectDeleteAction constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function __invoke()
    {
        $this->projectRepository->delete(request('projectSlug'));

        return back()->with('success', 'Projet supprimé');
    }
}
