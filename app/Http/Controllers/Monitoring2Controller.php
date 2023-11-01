<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Monitoring2Controller extends Controller
{
    public function index(Request $request){
        $type = $request->type;

        switch($type){
            case 'lists':
            
            break;
            default : 
            return inertia('Modules/Monitoring2/Index');
        }

    }
}
