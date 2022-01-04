<?php

namespace App\Http\Livewire;

use App\Models\PostComment;
use App\Models\PostLike;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class PostCard extends Component
{

    public $originalCaption;
    public $image;
    public $caption;
    public $creator;
    public $profile;
    public $postId;
    public $postLikes;
    public $ownLike;
    public $createdTime;
    public $readMore;
    public $postComments;
    public $comments;
    public $commentCount;

    public function mount($post)
    {
        $this->originalCaption = $post->caption;
        $this->postId = $post->id;
        $this->image = $post->image;
        $this->caption = Str::limit($post->caption, 100);
        $this->postLikes = $post->post_like;
        $this->ownLike = $post->own_like;
        $this->creator = $post->username;
        $this->profile = $post->profile_url;
        $this->createdTime = $post->created_at;
        $this->readMore = 1;
        $this->postComments = $post->post_comments;
        $this->comments = [];
        $this->commentCount = 2;
    }

    public function render()
    {
        return view('livewire.post-card');
    }

    public function like($postId)
    {
        $postLike = new PostLike();
        $postLike->user_id = 12;
        $postLike->post_id = $postId;
        $postLike->save();
    }

    public function readMore(){
        $this->caption = $this->originalCaption;
        $this->readMore = 0;
    }

    public function loadComments()
    {
        $this->comments = DB::table('post_comments')
                            ->select('post_comments.*', 'users.username', 'users.profile_url')
                            ->join('users', 'users.id', '=' , 'post_comments.user_id')
                            ->where('post_id', $this->postId)
                            ->latest()
                            ->limit($this->commentCount)
                            ->get();
    }

    public function increaseCommentCount()
    {
        $this->commentCount = $this->commentCount + 2;
        $this->loadComments();        
    }
}
