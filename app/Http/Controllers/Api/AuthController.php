<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response()->json(['error_message' => 'Incorrect Details.
            Please try again']);
        }

        dd(auth()->user()->tokens->first()->accessToken);

        return response()->json(['user' => auth()->user()->toJson(), 'token' => $response->json()], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $response = Http::asForm()->post('http://musya.local/oauth/token', [
                'grant_type' => 'password',
                'client_id' => '1',
                'client_secret' => 'sf6CDNiAYb9uvddxJq0nIKYf6rlqiRrpugxiA0FA',
                'username' => $user->email,
                'password' => $request->password,
                'scope' => '',
            ]);

            if ($response->status() == 200)
                return response()->json(['user' => $user->toJson(), 'token' => $response->json()], 200);
            else {
                return response()->json(['user_creation_erro' => 'Unable to generate user access token'], 419);
            }
        }
    }
}
