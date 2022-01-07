<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    $this->load('tags');
    return [
        'id' => $this->id,
        'name' => $this->name,
        'tags' => MovieTagResource::collection( $this->tags ),
        'poster' => env('APP_URL')."/".str_replace('public/', 'storage/', $this->poster),
        'created_at' => $this->created_at
    ];
  }
}
