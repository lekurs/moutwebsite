<?php


namespace App\UI\Action\Admin\Skills;


use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Skills\SkillShowAllResponder;
use Illuminate\Contracts\View\View;

class SkillShowAllAction
{
    private $skillRepository;

    /**
     * SkillCreationAction constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function __invoke(SkillShowAllResponder $responder): View
    {
        $skills = $this->skillRepository->getAll();

        return $responder($skills);
    }
}
