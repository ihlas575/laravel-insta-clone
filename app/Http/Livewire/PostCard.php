<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostCard extends Component
{

    public $image;
    public $caption;
    public $creator;
    public $profile;

    public function mount($post)
    {
        $this->image = $post->image;
        $this->caption = $post->caption;
        $this->creator = $post->username;
        $this->profile = $post->profile_url;
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
