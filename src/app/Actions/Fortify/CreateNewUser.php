<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'email' => [
                'required',
                'string',
                'email',
                'max:191',
                'unique:users'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:191'
            ]
        ])->validate();

        return \DB::transaction(function () use ($input) {
            $user = User::create([
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            Profile::create([
                'user_id' => $user->id,
            ]);

            return $user;
        });
    }
}
