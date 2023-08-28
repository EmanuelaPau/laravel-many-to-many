<?php

namespace App\Models;

use App\Models\Admin\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    use HasFactory;
}