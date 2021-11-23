<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['password', 'bio', 'profile_url', 'updated_at'];

    protected $hidden = ['password'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
