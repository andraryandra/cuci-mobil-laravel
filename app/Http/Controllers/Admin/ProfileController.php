<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed',
                'photo' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                'phone' => 'required|numeric|digits_between:10,13',
            ],
            [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh melebihi :max karakter.',
                'email.required' => 'Email harus diisi.',
                'email.string' => 'Email harus berupa teks.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email tidak boleh melebihi :max karakter.',
                'email.unique' => 'Email telah digunakan oleh pengguna lain.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password harus memiliki minimal :min karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'photo.mimes' => 'Format foto tidak valid.',
                'photo.max' => 'Ukuran foto tidak boleh melebihi :max KB.',
                'phone.required' => 'Nomor telepon harus diisi.',
                'phone.numeric' => 'Nomor telepon harus berupa angka.',
                'phone.digits_between' => 'Nomor telepon harus memiliki 10-13 digit.',

            ]
        );


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = (int) $request->phone;

        // Upload and save the photo with random name
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = Str::random(40) . '.' . $photo->extension();
            $photoPath = $photo->storeAs('profileUser', $photoName);
            $user->photo = $photoPath;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if(!$user)
        {
            return redirect()->back()->with('error', 'Gagal mengubah data profile');
        } else {
            return redirect()->back()->with('success', 'Berhasil mengubah data profile');
        }
    }
}
