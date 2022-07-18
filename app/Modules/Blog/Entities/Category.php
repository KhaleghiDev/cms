<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'parintid',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\CategoryFactory::new();
    }
}
