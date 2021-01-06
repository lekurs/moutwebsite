<?php


namespace App\UI\Responder\Admin\Profile;


use App\Models\User;

class ProfileShowOneResponder
{
    public function __invoke($color)
    {
        return view('admin.profile.show-profile', [
           'color' => $color,
        ]);
    }
}
