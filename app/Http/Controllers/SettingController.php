<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SchoolSemester;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return inertia('Modules/Settings/Index');
    }

    public function update(Request $request){
        $data = \DB::transaction(function () use ($request){
            $data = Setting::first();

            if($request->type == 'year'){
                $data->year = $request->year;
                $data->academic_year = $request->academic_year;
                $data->semester_id = NULL;
                $data->trimester_id = NULL;
                $data->quarter_id = NULL;
                SchoolSemester::query()->update(['is_active' => 0]);
            }else if($request->type == 'Semester'){
                $data->semester_id = $request->semester;
            }else if($request->type == 'Trimester'){
                $data->trimester_id = $request->semester;
            }else if($request->type == 'Quarter Term'){
                $data->quarter_id = $request->semester;
            }
            $data->save();
           
            return $data;
        });
        
        return back()->with([
            'message' => 'System configuration updated successfully',
            'data' => $data,
            'type' => 'bxs-check-circle',
            'color' => 'success'
        ]);
    }
}
