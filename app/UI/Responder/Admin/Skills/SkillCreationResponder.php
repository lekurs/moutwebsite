<?php


namespace App\UI\Responder\Admin\Skills;


class SkillCreationResponder
{
    public function __invoke()
    {
        return redirect()->route('skillShowAll')->with('success', 'Compétence ajoutée');
    }
}
