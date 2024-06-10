<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();


        $sql = "UPDATE `customer` SET `nama_customer` = ?, `email_customer` = ?, `telp_customer` = ?, `password` = ? WHERE `id_customer` = ?";
        //mengapa pakai params? karena kita validasi dlu 
        //bacanya tuh gini : kalo nama_customer ada di validated, maka pake validated, kalo ga ada pake user->nama_customer
        //apa itu validated? itu adalah data yang udah di validasi di ProfileUpdateRequest
        $params = [
            $validated['nama_customer'] ?? $user->nama_customer,
            $validated['email_customer'] ?? $user->email_customer,
            $validated['telp_customer'] ?? $user->telp_customer,
            $validated['password'] ?? $user->password,
            $user->id_customer,
        ];

        DB::update($sql, $params);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        DB::delete("DELETE FROM `customer` WHERE `id_customer` = ?", [$user->id_customer]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
