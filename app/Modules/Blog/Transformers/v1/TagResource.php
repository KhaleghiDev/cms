<?php

namespace Modules\Blog\Transformers\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' =>$this->title,
            'sulg' =>$this->slug,
           'status'=> $this->status,
            'date'=>jdate($this->created_at)->format('Y/m/d'),
            'time'=>jdate($this->created_at)->format('H:i:s'),
        ];
    }
}
