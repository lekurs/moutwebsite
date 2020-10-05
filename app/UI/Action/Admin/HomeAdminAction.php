<?php


namespace App\UI\Action\Admin;

use App\UI\Responder\Admin\HomeAdminResponder;
use App\UI\Responder\Interfaces\HomeAdminResponderInterface;

class HomeAdminAction
{

    public function __invoke(HomeAdminResponder $responder)
    {
        return $responder();
    }
}
