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
            'semesters' => (count($this->semesters)>0) ? $this->semesters[0] : '',
            'academic_year' => (count($this->semesters)>0) ? $this->semesters[0]->academic_year.' - '.$this->semesters[0]->semester->name : '-',
            'semester' => (count($this->semesters)>0) ? $this->semesters[0]->semester->name : '-',
            'start' => (count($this->semesters)>0) ? date('F Y', strtotime($this->semesters[0]->start_at)) : '-',
            'end' => (count($this->semesters)>0) ? date('F Y', strtotime($this->semesters[0]->end_at)) : '-',
            'status' => (count($this->semesters)>0) ? true : false,
        ];
    }
}
