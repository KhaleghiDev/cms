<?php

namespace Modules\Blog\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
         return [
            'id' => $this->id,
            'title' => $this->name,
            'slug' => $this->slug,
            'img' => $this->img,
            'atctor' => $this->user_id,
            'status' => $this->status,
            'view' => $this->view,
            'like' => $this->like,
            'created_at' => ($this->created_at),

        ];
    }
}
