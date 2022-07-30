<?php

namespace Modules\Blog\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prophecy\Promise\ThrowPromise;

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
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        public function user(){
            return $this->belongsTo(User::class);
        }



}
