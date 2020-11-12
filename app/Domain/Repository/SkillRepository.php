<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Skill;
use App\Http\Requests\StoreSkill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

class SkillRepository
{
    public function getAll(): Collection
    {
        return Skill::all();
    }

    public function getOneById($id): Skill
    {
        return Skill::whereId($id)->first();
    }

    public function store(array $datas): void
    {
        if (!empty($datas['skill_id'])) {
            $skill = $this->getOneById($datas['skill_id']);
            $skill->skill = $datas['skill-libelle'];
            $skill->save();
        } else {
            if(count($datas['skill-libelle']) > 1) {
                foreach($datas['skill-libelle'] as $skillWording) {
                    $skill = new Skill();
                    $skill->skill = $skillWording;
                    try {
                        $skill->save();

                    }
                    catch (QueryException $e) {
                        dd($e->getMessage());
                    }
                }
            } else {
                $skill = new Skill();
                $skill->skill = $datas['skill-libelle'][0];

                try {
                    $skill->save();

                }
                catch (QueryException $e) {
                    dd($e->getMessage());
                }
            }
        }
    }
}
