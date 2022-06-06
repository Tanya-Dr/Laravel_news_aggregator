<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('account.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request, User $user)
    {
        $validated = $request->validated();

        if(Hash::check($request->post('password'), $user->password)) {
            if($request->post('new_password')) {
                $validated['password'] = $validated['new_password'];
            }

            $validated['password'] = Hash::make($validated['password']);
            $user = $user->fill($validated);

            if($user->save()) {
                return redirect()->route('account.edit')
                    ->with('success', __('message.account.update.success'));
            }

            return back()->with('error', __('message.account.update.fail'));
        }

        return back()->with('error', __('auth.password'));
    }
}
