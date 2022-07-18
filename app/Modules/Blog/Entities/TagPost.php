<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag_post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "tag_id",
        "post_id",
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\TagPostFactory::new();
    }
}
