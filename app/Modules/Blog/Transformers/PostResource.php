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
        // dd($this->title,);
         return [
            'id'=>$this->id,
            'title' =>$this->title,
            'sulg' =>$this->slug,
            'img' => $this->img,
            'view' => $this->view,
            'status' => $this->status,
            'atctor' => $this->user_id,
            'like' => $this->like,
            'post'=>$this->post,
            'date'=>jdate($this->created_at)->format('Y/m/d'),
            'time'=>jdate($this->created_at)->format('H:i:s'),
        ];
    }
}
