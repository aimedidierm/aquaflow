<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(loginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $passwordMatch = Hash::check($password, $user->password);
            if ($passwordMatch) {
                Auth::login($user);
                if ($user->role == UserRole::ADMIN->value) {
                    return redirect("/admin");
                } elseif ($user->role == UserRole::WORKER->value) {
                    return redirect("/worker");
                } else {
                    return redirect(route('login'))->withErrors(['msg' => 'Invalid user role']);
                }
            } else {
                return redirect(route('login'))->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect(route('login'))->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        } else {
            return back();
        }
    }

    public function register(RegisterRequest $request)
    {
        $woker = new User();
        $woker->name = $request->input('name');
        $woker->email = $request->input('email');
        $woker->role = UserRole::WORKER->value;
        $woker->password = bcrypt($request->input('password'));
        $woker->save();

        return redirect('/');
    }
}
