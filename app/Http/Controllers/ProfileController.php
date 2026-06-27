<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // =========================
    // PROFIL ADMIN
    // =========================
    public function profilAdmin()
    {
        $user = User::find(session('admin_id'));

        return view('profiladmin', compact('user'));
    }

    // =========================
    // PROFIL PEMINJAM
    // =========================
    public function profilPeminjam()
    {
        $user = User::find(session('user_id'));

        return view('profilpeminjam', compact('user'));
    }

    // =========================
    // UPDATE PROFILE
    // =========================
    public function update(Request $request)
    {
        // =========================
        // AMBIL USER LOGIN
        // =========================
        $id = session('admin_id') ?? session('user_id');

        $user = User::find($id);

        // =========================
        // CEK USER
        // =========================
        if (!$user) {

            return back()->with(
                'error',
                'User tidak ditemukan'
            );

        }

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'password' => 'nullable|min:6|confirmed',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        // =========================
        // UPDATE DATA
        // =========================
        $user->name = $request->name;

        $user->email = $request->email;

        // =========================
        // UPDATE PASSWORD
        // =========================
        if ($request->filled('password')) {

            $user->password = Hash::make($request->password);

        }

        // =========================
        // UPDATE FOTO
        // =========================
        if ($request->hasFile('photo')) {

            $photo = $request->file('photo')
                ->store('profile', 'public');

            $user->photo = $photo;

        }

        // =========================
        // SIMPAN DATABASE
        // =========================
        $user->save();

        // =========================
        // UPDATE SESSION ADMIN
        // =========================
        if (session('admin_id')) {

            session([

                'admin_id'    => $user->id,
                'admin_name'  => $user->name,
                'admin_email' => $user->email,
                'admin_photo' => $user->photo,

            ]);

        }

        // =========================
        // UPDATE SESSION PEMINJAM
        // =========================
        if (session('user_id')) {

            session([

                'user_id'    => $user->id,
                'user'       => $user->name,
                'email'      => $user->email,
                'user_photo' => $user->photo,

            ]);

        }

        // =========================
        // REDIRECT
        // =========================
        return back()->with(
            'success',
            'Profil berhasil diupdate'
        );
    }
}