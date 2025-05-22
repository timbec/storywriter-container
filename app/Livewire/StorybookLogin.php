<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StorybookLogin extends Component
{
    public $first_name = '';
    public $email = '';

    public function submit()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Find or create user
        $user = User::firstOrCreate(
            ['email' => $this->email],
            ['name' => $this->first_name]
        );

        Auth::login($user);

        return redirect()->to('/storybook');
    }

    public function render()
    {
        return view('livewire.storybook-login');
    }
}
