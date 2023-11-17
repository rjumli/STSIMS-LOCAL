<?php

namespace App\Http\Resources\Monitoring;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    public function toArray($request)
    {
        $campus = ($this->is_main == 0) ? '- '.$this->campus : ''; 
        return [
            'name' => ucwords(strtolower($this->school->name.' '.$campus)),
            'campus' => $this->campus,
            'is_main' => $this->is_main,
            'semesters' => $this->semesters
        ];
    }
}
