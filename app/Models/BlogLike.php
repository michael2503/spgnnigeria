<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogLike extends Model
{
    protected $fillable =
    [
        'blog_id',
        'likes',
        'liker_ip',
        'liker_os',
        'liker_browser',
        'liker_location',
    ];
    use HasFactory;
}
