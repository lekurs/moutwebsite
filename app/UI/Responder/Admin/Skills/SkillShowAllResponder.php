<?php


namespace App\UI\Responder\Admin\Skills;


use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class SkillShowAllResponder
{
    public function __invoke(Collection $skills): View
    {
        return view('admin.skills.show_all_skills', [
            'skills' => $skills,
        ]);
    }
}
