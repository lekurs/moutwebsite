<?php


namespace App\UI\Action\Pub;


use App\Models\User;
use App\Notifications\Admin\ContactMail as AdminContactMail;
use App\Notifications\Pub\ContactMail as PubContactMail;

class SendContactMailAction
{

    public function __invoke()
    {
        $adminContactMail = new AdminContactMail(request()->all());
        $pubContactMail = new PubContactMail(request()->all());
        $delay = now()->addSeconds(30);
        $adminContactMail->delay($delay);
        $pubContactMail->delay($delay);


        (new User(['email' => 'hello@moutwebagency.com']))->notify($adminContactMail);
        (new User(['email' => request('email')]))->notify($pubContactMail);

        return back()->with('success', 'Votre message est bien envoyé');
    }
}
