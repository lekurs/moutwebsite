<?php


namespace App\UI\Action\Admin\Skills;


use App\Domain\Repository\SkillRepository;

class SkillDeleteAction
{
    private $skillRepository;

    /**
     * SkillDeleteAction constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function __invoke()
    {
        $this->skillRepository->delete(request('skillId'));

        return back()->with('success', 'Compétence supprimée');
    }
}
