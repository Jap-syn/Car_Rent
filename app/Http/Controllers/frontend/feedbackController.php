<?php

namespace App\Http\Controllers\frontend;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $loginUser = Auth::user();

        
        // $loginUserId = $loginUser->id;
   
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cars = DB::select('select * from car');
        
        return view('frontend.feedback.create')
            ->with('cars', $cars);
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
        $this->validate($request,[
            'description'=>'required'
        ]);
        $loginUser = Auth::user();
        $user_id=$loginUser->id;
        $car_id = $request->input('car_id');
        $description = $request->input('description');
        // $status = $request->input('status');
        $created_at = date("Y-m-d H:i:s");
        DB::insert('insert into feedback (user_id,car_id,description,created_at) values(?,?,?,?)',[$user_id,$car_id,$description,$created_at]);
               
                $successmessage = "(Thank for giving feedback) , Your feedback sent successfully !";
                $request->session()->flash('success', $successmessage);
               
                
                return redirect()->action(
                    'frontend\feedbackController@create');
              
      
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
        
        $cars = DB::select('select * from car where id='.$id);
        
        return view('frontend.feedback.create')
            ->with('cars', $cars);
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
