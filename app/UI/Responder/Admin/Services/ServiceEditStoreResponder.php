<?php


namespace App\UI\Responder\Admin\Services;


use Illuminate\Http\RedirectResponse;

class ServiceEditStoreResponder
{
    public function __invoke(): RedirectResponse
    {
        return redirect()->route('serviceShowAll')->with('success', 'Prestation mise à jour');
    }
}
