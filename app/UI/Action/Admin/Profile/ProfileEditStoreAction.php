<?php


namespace App\UI\Action\Admin\Profile;


use App\Domain\Repository\UserRepository;
use App\Http\Requests\EditProfile;
use App\Services\Uploads\UploadedFilesService;

class ProfileEditStoreAction
{
    private $userRepository;

    private $uploadedFilesService;

    /**
     * ProfileEditStoreAction constructor.
     * @param UserRepository $userRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(UserRepository $userRepository, UploadedFilesService $uploadedFilesService)
    {
        $this->userRepository = $userRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }

    public function __invoke(EditProfile $data)
    {
        $user = $this->userRepository->getOne($data['profile-id']);

        if ($this->userRepository->edit($data->all()) == true) {
            if (isset($data['profile-img'])) {
                $this->uploadedFilesService->moveFile($data['profile-img'], '/public/images/uploads/profiles/img/' . $user->profile_team_id);
            }

            return back()->with('success', 'Profil mis à jour');
        } else {
            return back()->with('error', 'Erreur, merci de vérifier les champs');
        }

    }
}
