<?php


namespace App\UI\Responder\Admin\Skills;


use App\Domain\Entity\Skill;
use Illuminate\Contracts\View\View;

class SkillShowOneResponder
{
    public function __invoke(Skill $skill): View
    {
        return view('admin.skills.show_skill', [
            'skill' => $skill
        ]);
    }
}
