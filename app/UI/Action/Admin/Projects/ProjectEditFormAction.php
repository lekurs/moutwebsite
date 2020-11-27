<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Projects\ProjectEditFormResponder;

class ProjectEditFormAction
{
    private ProjectRepository $projectRepository;

    private SkillRepository $skillRepository;

    /**
     * ProjectEditFormAction constructor.
     * @param ProjectRepository $projectRepository
     * @param SkillRepository $skillRepository
     */
    public function __construct(ProjectRepository $projectRepository, SkillRepository $skillRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->skillRepository = $skillRepository;
    }


    public function __invoke(ProjectEditFormResponder $responder)
    {
        $project = $this->projectRepository->getOneBySlug(request('projectSlug'));
        $skills = $this->skillRepository->getAll();

        return $responder($project, $skills);
    }
}
