<?php


namespace App\UI\Responder\Admin\Skills;


use Illuminate\Http\RedirectResponse;

class SkillEditStoreResponder
{
    public function __invoke(): RedirectResponse
    {
        return redirect()->route('skillShowAll')->with('success', 'Votre compétence à été mise à jour');
    }
}
