<?php


namespace App\Http\Controllers\User;


use App\Domain\Repository\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfile;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    private UserRepository $userRepository;

    private UploadedFilesService $uploadedFilesService;

    /**
     * ProfileController constructor.
     * @param UserRepository $userRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(UserRepository $userRepository, UploadedFilesService $uploadedFilesService)
    {
        $this->userRepository = $userRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }


    public function show(): View
    {
        return \view('pages.admin.users.show');
    }

    public function update(EditProfile $data)
    {
        $user = $this->userRepository->getOne($data['profile-id']);

        if ($this->userRepository->edit($data->validated())) {
            if (isset($data['profile-img'])) {
                $this->uploadedFilesService->moveFile($data['profile-img'], '/public/images/uploads/profiles/img/' . $user->profile_team_id);
            }

            $this->userRepository->edit($data->validated());

            return back()->with('success', 'Profil mis à jour');
        } else {
            return back()->with('error', 'Erreur, merci de vérifier les champs');
        }
    }
}
