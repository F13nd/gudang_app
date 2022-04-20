<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Email tidak boleh kosong !',
            'email.exists' => 'Email tidak terdaftar !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.string' => 'Password tidak valid !',
            'password.min' => 'Password minimal 8 karakter !',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'The given data was invalid !',
                'errors' => ['password' => ['Password yang anda masukan salah !']]
            ], 401);
        }

        $token = $user->createToken(Str::random(40))->plainTextToken;

        return response([
            'success' => true,
            'data' => [
                'token' => $token,
                'user' => $user,
            ],
            'message' => 'Login berhasil !',
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'name' => 'required',
            'role' => 'required|in:distributor,supplier',
        ], [
            'email.required' => 'Email tidak boleh kosong !',
            'email.unique' => 'Email sudah digunakan !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.string' => 'Password tidak valid !',
            'password.min' => 'Password minimal 8 karakter !',
            'name.required' => 'Nama harus diisi',
            'role.required' => 'Role harus diisi',
            'name.in' => 'Role harus diisi distributor atau supplier',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'token' => $user->createToken(Str::random(40))->plainTextToken
            ],
            'message' => 'Berhasil mendaftar sebagai job seeker'
        ], 200);
    }

    public function profile()
    {
        return response([
            'success' => true,
            'data' => auth()->user(),
            'message' => 'Login berhasil !',
        ], 200);
    }
}
