<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            ['name' => $validated['name']]
        );

        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['name'],
                'password' => bcrypt(str()->random(32)), // <- random password
            ]
);


        Auth::login($user);

        return redirect()->intended('/storybook');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
