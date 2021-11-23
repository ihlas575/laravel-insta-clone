<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ProfilePage extends Component
{
    public $username;

    public function mount($username)
    {
        $this->username = $username;
    }

    public function render()
    {
        $user = User::where('username', $this->username)->first();
        return view('livewire.profile-page', compact('user'))->layout('layouts.app');
    }
}
