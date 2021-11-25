<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewsFeedPage extends Component
{

    public $readyToLoad = false;
 
    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $userId = 12;

        $posts = Post::query()
        ->withCount(['likes AS post_like' => function ($query) use($userId) {
            $query->where('user_id', '=', $userId);
        }])
        ->limit(10)
        ->get();

        return view('livewire.news-feed-page', [
            'posts' => $this->readyToLoad
                ? $posts
                : [],
        ])->layout('layouts.app');
    }
}
