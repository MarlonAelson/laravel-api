<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'identify' => $this->id,
            'name'     => $this->name,
            'email'    => $this->email,
            'created'  => Carbon::make($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
