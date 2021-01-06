<?php


namespace App\Domain\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository
{
    public function getAll(): Collection
    {
        return User::all();
    }

    public function getOne($id): User
    {
        return User::whereId($id)->first();
    }

    public function edit(array $data): bool
    {
        if (!is_null($data['profile-id'])) {
            $user = $this->getOne($data['profile-id']);
            $name = $user->name;
            $lastname = $user->lastname;

            if (!is_null($data['profile-name'])) {
                if ($name != $data['profile-name']) {
                    $name = $data['profile-name'];
                }
                $user->name = $data['profile-name'];
            }

            if (!is_null($data['profile-lastname'])) {
                if ($lastname != $data['profile-lastname']) {
                    $lastname = $data['profile-lastname'];
                }
                $user->lastName = $data['profile-lastname'];
            }

            if (!is_null($data['profile-password'])) {
                $user->password = Hash::make($data['profile-password']);
            }

            if (isset($data['profile-img'])) {
                $user->profile_photo_path = $data['profile-img']->getClientOriginalName();
            }

            if (!is_null($data['profile-name']) || !is_null($data['profile-lastname'])) {
                $user->slug = Str::slug($name . '-' . $lastname);
            }

            $user->save();

            return true;
        }

        return false;
    }
}
