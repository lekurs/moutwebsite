<?php


namespace App\UI\Action\Admin\Skills;


use App\Domain\Repository\SkillRepository;
use App\Http\Requests\StoreSkill;
use App\UI\Responder\Admin\Skills\SkillEditStoreResponder;

class SkillEditStoreAction
{
    private $skillRepository;

    /**
     * SkillEditStoreAction constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function __invoke(StoreSkill $storeSkill, SkillEditStoreResponder $responder)
    {
        $this->skillRepository->store($storeSkill->all());

        return $responder();
    }
}
