<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'image' => $this->image,
            'notes' => $this->notes,
            'position' => $this->position,
            'birth_date' => $this->birth_date,
            'nationality' => $this->nationality,
            'mbti_mini_link' => $this->mbti_mini_link,
            'mbti_full_link' => $this->mbti_full_link,
            'dna_mini_link' => $this->dna_mini_link,
            'dna_full_link' => $this->dna_full_link,
            'tag' => $this->tag,
            'team_id' => $this->team_id,
            'key_person_id' => $this->key_person_id,
            'agent_id' => $this->agent_id,
            'family' => $this->family,
            'key_person' => $this->keyPerson,
            'agent' => $this->agent,
            'team' => $this->team,
        ];
    }
}
