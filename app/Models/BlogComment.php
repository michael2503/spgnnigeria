<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'blog_id',
        'user_id',
        'parent_id',
        'first_name',
        'last_name',
        'email',
        'comment',
        'anonymous',
        'update_by',
        'status',
        'comment_ip',
        'comment_os',
        'comment_browser',
        'comment_location',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function blog(){
        return $this->belongsTo(Blog::class);
    }


    public function replies(){
        return $this->hasMany(BlogComment::class, 'parent_id');
    }
}
