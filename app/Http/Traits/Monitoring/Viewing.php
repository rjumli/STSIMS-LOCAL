<?php

namespace App\Http\Traits\Monitoring;

use App\Models\Scholar;
use App\Models\ScholarEnrollment;
use App\Models\ScholarAddress;
use App\Models\ScholarEducation;
use App\Models\ScholarProfile;
use App\Http\Resources\Scholar\SearchResource;
use App\Http\Resources\Scholar\IndexResource;
use App\Http\Resources\Scholar\Info\ListResource;

trait Viewing { 
    
    public static function lists($request){
        // $info = (!empty(json_decode($request->info))) ? json_decode($request->info) : NULL;
        $filter = (!empty(json_decode($request->subfilters))) ? json_decode($request->subfilters) : NULL;
        $keyword = $request->keyword;

        $data = IndexResource::collection(
            Scholar::
            with('addresses.region','addresses.province','addresses.municipality','addresses.barangay')
            ->with('profile')
            ->with('program:id,name','subprogram:id,name','category:id,name','status:id,name,type,color,others')
            ->with('education.school.school','education.course','education.level')
            ->whereHas('profile',function ($query) use ($keyword) {
                $query->when($keyword, function ($query, $keyword) {
                    $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', '%'.$keyword.'%')
                    ->where(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', '%'.$keyword.'%')
                    ->orWhere('spas_id','LIKE','%'.$keyword.'%');
                });
            })
            ->whereHas('addresses',function ($query) use ($filter) {
                if(!empty($filter)){
                    (property_exists($filter, 'region')) ? $query->where('region_code',$filter->region)->where('is_permanent',1) : '';
                    (property_exists($filter, 'province')) ? $query->where('province_code',$filter->province)->where('is_permanent',1) : '';
                    (property_exists($filter, 'municipality')) ? $query->where('municipality_code',$filter->municipality)->where('is_permanent',1) : '';
                    (property_exists($filter, 'barangay')) ? $query->where('barangay_code',$filter->barangay)->where('is_permanent',1) : '';
                }
            })
            ->whereHas('education',function ($query) use ($filter) {
                if(!empty($filter)){
                    (property_exists($filter, 'school')) ? $query->where('school_id',$filter->school) : '';
                    (property_exists($filter, 'course')) ? $query->where('course_id',$filter->course) : '';
                }
            })
            ->where(function ($query) use ($filter) {
                if(!empty($filter)){
                    (property_exists($filter, 'program')) ? $query->where('program_id',$filter->program) : '';
                    (property_exists($filter, 'subprogram')) ? $query->where('subprogram_id',$filter->subprogram) : '';
                }
             })
            ->whereHas('status',function ($query){
                $query->where('type','Ongoing');
            })
            ->limit(5)->get()
        );

        return $data;
    }

    public function monitoring($request){
        $id = $request->id;

        // $data = Scholar::
        // with('benefits.benefit')
        // select('id')->
        // with('enrollments.semester.semester')
        // ->with('enrollments.semester.benefits.benefit:id,name,short','enrollments.semester.benefits.status:id,name,color')
        // ->with('enrollments.level')->with('enrollments.lists')
        // ->with('enrollments.enrollee')
        // ->withWhereHas('benefits', function ($query) {
        //     $query->where('status_id',13);
        // })
        // ->withWhereHas('enrollments.semester.benefits', function ($query) use ($id) {
        //     $query->where('scholar_id',$id);
        // })
        // ->where('id',$id)
        // ->first();


        $data = ScholarEnrollment::
        withWhereHas('semester', function ($query) {
            $query->select('id','academic_year','semester_id','start_at','end_at')
            ->withWhereHas('semester', function ($query) {
                $query->select('id','name');
            });
        })
        ->withWhereHas('level', function ($query) {
            $query->select('id','name','others');
        })
        ->withWhereHas('lists', function ($query){
            $query->select('id','enrollment_id','code','subject','unit','grade','is_failed');
        })
        ->withWhereHas('benefits', function ($query){
            $query->select('id','enrollment_id','amount','month','benefit_id','status_id')
            ->withWhereHas('benefit', function ($query){
                $query->select('id','name','type','short','regular_amount','summer_amount');
            })
            ->withWhereHas('status', function ($query){
                $query->select('id','name','color','others');
            });
        })
        ->where('scholar_id',$id)
        ->get();

       return ListResource::collection($data);
    }   

    public function batch($request){
        $awardedYears = Scholar::whereHas('status',function ($query){
            $query->where('type','Ongoing');
        })
        ->groupBy('awarded_year')
        ->select('awarded_year',\DB::raw('count(*) as scholar_count'))
        ->get();

        return $awardedYears;
    }
}