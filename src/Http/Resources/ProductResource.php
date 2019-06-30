<?php

namespace DesignByCode\Admin\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use DesignByCode\Admin\Http\Resources\TagsCollection;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return  parent::toArray($request);
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'price' => $this->price,
            'sales_price' => $this->sales_price,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'live' => $this->live,
            'availability' => $this->availability,
            'sale_end' => ($this->sale_end !== null) ? $this->sale_end->toDateString() : '',
            // 'publish_at' => ($this->publish_at !== null) ? $this->publish_at->toDateTimeString() : '',
            // 'sale_end' => Carbon::createFromFormat('Y-m-d H:i:s', $this->sale_end)->format('Y-m-d'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tags' => new TagsCollection($this->tags)
        ];
    }
}
