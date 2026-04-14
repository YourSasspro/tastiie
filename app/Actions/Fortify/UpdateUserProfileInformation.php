<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'phone_number' => ['required', 'string'],
            'delivery_address' => ['required', 'string', 'max:255'],
            'where_did_you_hear_about_us' => ['nullable', 'string', 'max:500'],
        ])->validate();


        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'first_name'                  => $input['first_name'],
                'last_name'                   => $input['last_name'],
                'name'                        => $input['first_name'] . ' ' . $input['last_name'],
                'email'                       => $input['email'],
                'phone_number'                => $input['phone_number'],
                'delivery_address'            => $input['delivery_address'],
                'where_did_you_hear_about_us' => $input['where_did_you_hear_about_us'] ?? null,
            ])->save();
            // session()->flash(['message' => __('gen.updated_successfully',['attribute' => trans('gen.data')]), 'type' => 'success']);

            session()->flash('message', __('gen.updated_successfully', ['attribute' => trans('gen.profile')]));
            session()->flash('type', 'success');
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'first_name'                  => $input['first_name'],
            'last_name'                   => $input['last_name'],
            'email'                       => $input['email'],
            'phone_number'                => $input['phone_number'],
            'delivery_address'            => $input['delivery_address'],
            'where_did_you_hear_about_us' => $input['where_did_you_hear_about_us'] ?? null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
