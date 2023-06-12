<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Ultra\UltraUser;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @param UltraUser $ultraUser
     * @param bool $sync
     *
     * @return void
     */
    public function updateOrCreate(UltraUser $ultraUser, bool $sync = false)
    {
        $user = User::firstOrNew(['username' => $ultraUser->username]);

        $newEmail = $ultraUser->email;
        if (!$this->isEmailUnique($newEmail, $user->id)) {
            $newEmail = 'duplicated.' . $newEmail;
            // throw ValidationException::withMessages([
            //     'email' => [__('app.email.duplicate')],
            // ]);
        }

        if (!strpos($newEmail, 'fake.com')) {
            $user->email = $newEmail;
        } elseif (!$user->email || strpos($user->email, 'fake.com')) {
            $user->email = $newEmail;
        }

        $user->username = $ultraUser->username;
        $user->password = Hash::make($ultraUser->password);
        $user->name = $ultraUser->fullName;
        $user->moodle_id = $ultraUser->moodleId;
        if ($sync) {
            $user->function = $ultraUser->function;
            $user->division = $ultraUser->division;
            $user->area = $ultraUser->area;
            $user->sub_area = $ultraUser->sub_area;
            $user->position = $ultraUser->position;
            $user->cfh = $ultraUser->cfh;
            $user->board_of_director = $ultraUser->boardOfDirector;
            $user->active = $ultraUser->active;
        }
        $user->save();
    }

    /**
     * @param string $email
     * @param int $excludedId
     *
     * @return bool
     */
    public function isEmailUnique($email, $excludedId = 0)
    {
        $count = User::where('email', $email)
            ->where('id', '<>', $excludedId)
            ->count();

        if ($count > 0) {
            return false;
        }

        return true;
    }
}
