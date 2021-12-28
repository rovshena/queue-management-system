<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();
        Validator::make($request->all(), [
            'password' => ['required', 'confirmed', 'string', 'max:250', new Password],
            'current_password' => ['required', 'string'],
        ])->after(function ($validator) use ($request, $user) {
            if (!Hash::check($request->current_password, $user->password)) {
                $validator->errors()->add('current_password', __('Häzirki parolyňyz siziň hakyky parolyňyz bilen gabat gelmeýär.'));
            }
        })->validate();

        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return back()->with('success', __('Parol üstünlikli üýtgedildi.'));
        } else {
            return back()->with('error', __('Parol üýtgedilmedi.'));
        }
    }

    public function edit()
    {
        return view('auth.profile');
    }

    public function update(UserProfileRequest $request)
    {
        if ($request->user()->update($request->validated())) {
            return back()->with('success', __('Hasabyňyz üstünlikli üýtgedildi.'));
        } else {
            return back()->with('error', __('Hasabyňyz üýtgedilmedi.'));
        }
    }
}
