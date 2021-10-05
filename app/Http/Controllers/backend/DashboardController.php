<?php

namespace App\Http\Controllers\backend;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            
            // Start - Searching Car Count Process
                $car_count_raw = DB::select('select count(id) AS car_count from car where status = 1');
    
                if (isset($car_count_raw) && count($car_count_raw)>0) {
                    $car_count = $car_count_raw[0]->car_count;
                } else {
                    $car_count = 0;
                }

                $loginUser = Auth::user();
                $loginUserId = $loginUser->id;
                // End - Searching Car Count Process
                $car_count_raws = DB::select('select count(id) AS car_counts from car where user_id='.$loginUserId);
    
                if (isset($car_count_raws) && count($car_count_raws)>0) {
                    $car_counts = $car_count_raws[0]->car_counts;
                } else {
                    $car_counts = 0;
                }
               
                // Start - Searching User Count except Adimin (Role 2) Process
                $user_count_raw = DB::select('select count(id) AS user_count from users where role_id = 2');
    
                if (isset($user_count_raw) && count($user_count_raw)>0) {
                    $user_count = $user_count_raw[0]->user_count;
                } else {
                    $user_count = 0;
                }
                // End - Searching User Count except Adimin (Role 2) Process
                $user_count_raws = DB::select('select count(id) AS user_counts from users where role_id = 3');
    
                if (isset($user_count_raws) && count($user_count_raws)>0) {
                    $user_counts = $user_count_raws[0]->user_counts;
                } else {
                    $user_counts = 0;
                }
               
                // Start - Searching Car Registration Process
                $registration_count_raw = DB::select('select count(id) AS registration_count from registered_car where status = 1');
    
                if (isset($registration_count_raw) && count($registration_count_raw)>0) {
                    $registration_count = $registration_count_raw[0]->registration_count;
                } else {
                    $registration_count = 0;
                }
                // End - Searching Car Registration Process
                
                $registration_count_raws = DB::select('select count(id) AS registration_counts from registered_car where status = 2');
    
                if (isset($registration_count_raws) && count($registration_count_raws)>0) {
                    $registration_counts = $registration_count_raws[0]->registration_counts;
                } else {
                    $registration_counts = 0;
                }

                $registration_count_rawss = DB::select('select count(id) AS registration_countss from registered_car where status = 0');
    
                if (isset($registration_count_rawss) && count($registration_count_rawss)>0) {
                    $registration_countss = $registration_count_rawss[0]->registration_countss;
                } else {
                    $registration_countss = 0;
                }

                $loginUser = Auth::user();
                $loginUserId = $loginUser->id;
                
                $registration_count_row = DB::select('select count(*) AS registration_co from registered_car AS r JOIN car AS c
                ON c.id = r.car_id where r.status = 1 and c.user_id ='.$loginUserId);
    
                if (isset($registration_count_row) && count($registration_count_row)>0) {
                    $registration_co = $registration_count_row[0]->registration_co;
                } else {
                    $registration_co = 0;
                }

                $loginUser = Auth::user();
                $loginUserId = $loginUser->id;
                
                $registration_count_rows = DB::select('select count(*) AS registration_cos from registered_car AS r JOIN car AS c
                ON c.id = r.car_id where r.status = 2 and c.user_id ='.$loginUserId);
    
                if (isset($registration_count_rows) && count($registration_count_rows)>0) {
                    $registration_cos = $registration_count_rows[0]->registration_cos;
                } else {
                    $registration_cos = 0;
                }

                $loginUser = Auth::user();
                $loginUserId = $loginUser->id;
                
                $registration_count_rowss = DB::select('select count(*) AS registration_coss from registered_car AS r JOIN car AS c
                ON c.id = r.car_id where r.status = 0 and c.user_id ='.$loginUserId);
    
                if (isset($registration_count_rowss) && count($registration_count_rowss)>0) {
                    $registration_coss = $registration_count_rowss[0]->registration_coss;
                } else {
                    $registration_coss = 0;
                }


                return view('backend.dashboard')
                ->with('car_count', $car_count)
                ->with('car_counts', $car_counts)
                ->with('user_count', $user_count)
                ->with('user_counts', $user_counts)
                ->with('registration_co', $registration_co)
                ->with('registration_cos', $registration_cos)
                ->with('registration_coss', $registration_coss)
                ->with('registration_counts', $registration_counts)
                ->with('registration_countss', $registration_countss)
                ->with('registration_count', $registration_count);
            }
            else{
                return redirect()->route('login');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
