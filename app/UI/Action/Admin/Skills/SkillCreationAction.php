<?php


namespace App\UI\Action\Admin\Skills;


use App\Domain\Repository\SkillRepository;
use App\Http\Requests\StoreSkill;
use App\UI\Responder\Admin\Skills\SkillCreationResponder;
use Illuminate\Http\RedirectResponse;

class SkillCreationAction
{
    private SkillRepository $skillRepository;

    /**
     * SkillCreationAction constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function __invoke(StoreSkill $storeSkill, SkillCreationResponder $responder): RedirectResponse
    {
        $this->skillRepository->store($storeSkill->all());
        return $responder();
    }
}
