<?php


namespace App\UI\Action\Admin\Skills;


use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Skills\SkillShowOneResponder;

class SkillShowOneAction
{
    private SkillRepository $skillRepository;

    /**
     * SkillShowOneAction constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function __invoke(SkillShowOneResponder $responder)
    {
        $skill = $this->skillRepository->getOneById(request('skillId'));

        return $responder($skill);
    }
}
