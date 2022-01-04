<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewsFeedPage extends Component
{

    public $readyToLoad = false;
    public $limitPerPage = 10;
    protected $posts = [];

    protected $listeners = [
        'load-more' => 'loadMore'
    ];
   
    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }
 
    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $userId = 12;

        //eloquent way
        //But there is a best way to do
        // $posts = Post::withCount(['likes AS own_like' => function ($query) use($userId) {
        //     $query->where('user_id', '=', $userId);
        // }])
        // ->withCount('likes as post_like')
        // ->limit(10)
        // ->get();

        $this->posts = DB::table('posts')
                ->select("posts.*",'users.username', 'users.profile_url',
                DB::raw("(SELECT COUNT(*) FROM post_likes
                            WHERE post_likes.post_id = posts.id) as post_like"),
                DB::raw("(SELECT COUNT(*) FROM post_comments
                            WHERE post_comments.post_id = posts.id) as post_comments"),
                DB::raw("(SELECT COUNT(*) FROM post_likes
                            WHERE post_likes.post_id = posts.id) as own_like"))
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->latest()
                ->paginate($this->limitPerPage);

        return view('livewire.news-feed-page', [
            'posts' => $this->readyToLoad
                ? $this->posts
                : [],
        ])->layout('layouts.app');
    }
}
