<?php


namespace App\UI\Responder\Admin;


use App\UI\Responder\Interfaces\HomeAdminResponderInterface;

class HomeAdminResponder implements HomeAdminResponderInterface
{
    public function __invoke()
    {
        return view('admin.home_admin');
    }
}
