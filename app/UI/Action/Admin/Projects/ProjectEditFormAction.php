<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Projects\ProjectEditFormResponder;

class ProjectEditFormAction
{
    private $projectRepository;

    private $skillRepository;

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
        $project = $this->projectRepository->getOneBySLugWithMediasOrderByDisplay(request('projectSlug'));
        $skills = $this->skillRepository->getAll();
        $projectSKills = [];

        foreach($project->skills as $skillProject)
        {
            $projectSKills[] = $skillProject->skill;
        }

        return $responder($project, $skills, $projectSKills);
    }
}
