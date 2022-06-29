<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalResource extends JsonResource
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
            "id" => (string) $this->id,
            "type" => "Personals",
            "attributes" => [
                "name" => $this->name,
                "surname" => $this->surname,
                "address_id" => $this->address_id,
                "city" => $this->address->city->name,
                "district" => $this->address->district->name,
                "phones" => $this->phones,
            ],
        ];
    }
}
