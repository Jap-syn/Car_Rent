<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
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
        $subs = DB::select('SELECT f.*,u.name AS user_name,u.image AS user_image
        FROM 
        feedback AS f 
        JOIN users AS u
        ON f.user_id = u.id
        where u.role_id = 2
      ');
      return view('backend.feedback.index')
      ->with('subs',$subs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.feedback.create');
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
       
        $description = $request->input('description');
        // $status = $request->input('status');
        $created_at = date("Y-m-d H:i:s");
        DB::insert('insert into feedback (user_id,description,created_at) values(?,?,?)',[$user_id,$description,$created_at]);
               
                $successmessage = "(Thank for giving feedback) , Your feedback sent successfully !";
                $request->session()->flash('success', $successmessage);
               
                return redirect()->action(
                    'backend\feedbackController@create');
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
