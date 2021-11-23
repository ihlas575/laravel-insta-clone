<?php

namespace App\Http\Livewire;

use App\Models\Post;
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
       $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->orderByDesc('posts.created_at')
                ->get();

        return view('livewire.news-feed-page', [
            'posts' => $this->readyToLoad
                ? $posts
                : [],
        ])->layout('layouts.app');
    }
}
