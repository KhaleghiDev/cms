<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'post',
        'img',
        'user_id',
        'status',
        'view',
        'like',
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\PostFactory::new();
    }
}
