<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // =====================================
    // HALAMAN LOGIN ADMIN
    // =====================================
    public function showLogin()
    {
        return view('loginadmin');
    }

    // =====================================
    // LOGIN ADMIN
    // =====================================
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ]);

        session()->flush();

        $admin = User::where('username', $request->username)
                    ->where('role', 'admin')
                    ->first();

        // CEK PASSWORD
        if ($admin && Hash::check($request->password, $admin->password)) {

            session([
                'admin_id'    => $admin->id,
                'admin_name'  => $admin->name,
                'admin_email' => $admin->email,
                'admin_role'  => 'admin',
                'admin_photo' => $admin->photo,
            ]);

            return redirect('/dashboard-admin');
        }

        return back()->with(
            'error',
            'Username atau password admin salah!'
        );
    }

    // =====================================
    // HALAMAN LOGIN PEMINJAM
    // =====================================
    public function showLoginUser()
    {
        return view('loginpeminjam');
    }

    public function showRegister()
    {
        return view('registerpeminjam');
    }

    // =====================================
    // LOGIN PEMINJAM
    // =====================================
    public function loginPeminjam(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // HAPUS SESSION LAMA
        session()->flush();

        // CARI PEMINJAM
        $user = User::where('email', $request->email)
                    ->where('role', 'peminjam')
                    ->first();

        // CEK PASSWORD
        if ($user && Hash::check($request->password, $user->password)) {

            session([

                'user_id' => $user->id,
                'user' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'user_photo' => $user->photo

            ]);

            return redirect('/dashboard-peminjam');

        }

        return back()->with(
            'error',
            'Username atau password peminjam salah!'
        );
    }

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',

        ]);

        User::create([

            'name' => $request->name,
            'username' => Str::slug($request->name, '_'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'peminjam',

        ]);

        return redirect('/login-user')
            ->with(
                'success',
                'Registrasi berhasil, silakan login'
            );
    }

    // =====================================
    // LOGOUT
    // =====================================
    public function logout()
    {
        session()->flush();

        return redirect('/');
    }

    // =====================================
    // HALAMAN LUPA PASSWORD
    // =====================================
    public function showForgot()
    {
        return view('lupa-password');
    }

    // =====================================
    // RESET PASSWORD ADMIN
    // =====================================
    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ]);

        $admin = User::where('username', $request->username)
                    ->where('role', 'admin')
                    ->first();

        if (!$admin) {

            return back()->with(
                'error',
                'Admin tidak ditemukan!'
            );
        }

        $admin->password = Hash::make($request->password);

        $admin->save();

        return redirect('/login-admin')
            ->with(
                'success',
                'Password admin berhasil diubah!'
            );
    }

    // =====================================
    // RESET PASSWORD PEMINJAM
    // =====================================
    public function resetPasswordPeminjam(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', 'peminjam')
                    ->first();

        if (!$user) {

            return back()->with(
                'error',
                'Peminjam tidak ditemukan!'
            );
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login-user')
            ->with(
                'success',
                'Password peminjam berhasil diubah!'
            );
    }
}