<?php

namespace Modules\Blog\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'id'=>$this->id,
            'title' =>$this->title,
            'sulg' =>$this->slug,
            'parintid' =>$this->parintid,
            'date'=>jdate($this->created_at)->format('Y/m/d'),
            'time'=>jdate($this->created_at)->format('H:i:s'),
        ];
    }
}
