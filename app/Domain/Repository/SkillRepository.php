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

    public function updateStatus(int $skillId): void
    {
        $skill = $this->getOneById($skillId);

        if($skill->status === 1) {
            $skill->status = 0;
            $skill->save();
        } else {
            $skill->status = 1;
            $skill->save();
        }
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

    public function delete(int $skillId): void
    {
        $skill = $this->getOneById($skillId);
        $skill->delete();
    }
}
