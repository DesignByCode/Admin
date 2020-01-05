<?php

namespace DesignByCode\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DesignByCode\Admin\Http\Resources\MediaResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
