<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\log;

class LogController extends Controller
{
    public function index(){

     
        $objs = log::orderBy("id", "desc")->get();    
        
        return view('backend.log.index')
            ->with('objs', $objs);
    }
}
