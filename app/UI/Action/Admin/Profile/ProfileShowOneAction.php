<?php


namespace App\UI\Action\Admin\Profile;


use App\Services\RandColor\RandColorService;
use App\UI\Responder\Admin\Profile\ProfileShowOneResponder;

class ProfileShowOneAction
{
    private $randColorService;

    /**
     * ProfileShowOneAction constructor.
     * @param RandColorService $randColorService
     */
    public function __construct(RandColorService $randColorService)
    {
        $this->randColorService = $randColorService;
    }


    public function __invoke(ProfileShowOneResponder $responder)
    {
        $color = $this->randColorService->randomColor();

        return $responder($color);
    }
}
