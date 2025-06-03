<?php
namespace App\Http\Controllers;

use App\Models\StorybookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorybookLoginController extends Controller
{
    public function show()
    {
        return view('storybook.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = StorybookUser::firstOrCreate(
            ['email' => $data['email']],
            ['name' => $data['name']]
        );

        Auth::guard('storybook')->login($user);

        return redirect('/storybook');
    }

    public function logout()
    {
        Auth::guard('storybook')->logout();
        return redirect('/storybook/login');
    }
}
