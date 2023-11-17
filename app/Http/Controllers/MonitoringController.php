<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Scholar;
use App\Models\SchoolCampus;
use Illuminate\Http\Request;
use App\Http\Traits\Monitoring\Save;
use App\Http\Traits\Monitoring\Count;
use App\Http\Traits\Monitoring\Viewing;

class MonitoringController extends Controller
{
    use Count, Viewing, Save; 

    public $code;

    public function __construct()
    {
        $setting = Setting::first();
        $this->code = $setting->agency->region_code;
    }

    public function index(Request $request){
        $type = $request->type;

        switch($type){
            case 'counts':
                $array = [
                    'termination' => $this->termination($request),
                    // 'enrolled' => $this->enrolled($request),
                    // 'scholars' => $this->scholars($request),
                    // 'semesters' => $this->semesters($request),
                    // 'schools' => $this->schools(),
                    'graduating' => [],
                    // 'total' => Scholar::count()
                ];
                return $array;
            break;
            case 'schoolsemesters':
                return $this->schoolsemesters($request);
            break;
            case 'missed':
                return $this->missed($request);
            break;
            case 'unenrolled':
                return $this->unenrolled($request);
            break;
            case 'batch':
                return $this->batch($request);
            break;
            case 'benefits':
                return $this->benefits($request);
            break;
            case 'grades':
                return $this->grades($request);
            break;
            case 'index':
                $array = [
                    'statuses' => $this->statuses(),
                    'checking' => $this->checking($request),
                    'released' => $this->released(),
                ];
                return $array;
            break;
            case 'lists':
                return $this->lists($request);
            break;
            case 'monitoring':
                return $this->monitoring($request);
            break;
            default : 
            return inertia('Modules/Monitoring/Index',
            [
                'count_status' => $this->statuses(),
                'count_checking' => $this->checking($request),
                'count_released' => $this->released(),
                'counts' => [
                    'termination' => $this->termination($request),
                    'enrolled' => $this->enrolled($request),
                    'scholars' => $this->scholars($request),
                    'semesters' => $this->semesters($request),
                    'schools' => $this->schools(),
                    'graduating' => [],
                    'total' => Scholar::count()
                ],
                'terms' => [
                    'semester' => SchoolCampus::where('term_id',4)->where('region_code',$this->code)->count(),
                    'trimester' => SchoolCampus::where('term_id',5)->where('region_code',$this->code)->count(),
                    'quarter' => SchoolCampus::where('term_id',6)->where('region_code',$this->code)->count(),
                ]
            ]);
        }
    }

    public function store(Request $request){
        switch($request->type){
            case 'checked':
                return $this->checked($request);
            break;
            case 'termination':
                return $this->terminate($request);
            break;
        }
    }
}
