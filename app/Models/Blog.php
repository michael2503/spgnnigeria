<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'category',
        'title',
        'slug',
        'image',
        'tags',
        'content',
        'seen',
        'admin_id',
        'status',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function comments(){
        return $this->hasMany(BlogComment::class)->whereNull('parent_id');
    }
}
