<?php


namespace App\UI\Action\Admin\Skills;


use App\Domain\Repository\SkillRepository;

class SkillStatusAction
{
    private SkillRepository $skillRepository;

    /**
     * SkillStatusAction constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function __invoke()
    {
        $this->skillRepository->updateStatus(request('skillId'));

        return back()->with('success', 'Status modifié');
    }
}
