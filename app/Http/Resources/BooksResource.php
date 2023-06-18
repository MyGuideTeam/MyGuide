<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'img' => $this->avatar,
            'name' => $this->title,
            'author'=> $this->author,
            'publish_year' => Carbon::parse($this->publish_year)->format('Y'),
            'audio_file' => $this->audio
        ];
    }
}
