<?php

namespace App\Http\Controllers\backend;
use DB;
use Auth;
use Mail;
use App\Mail\RegistrationStatusMail;
use App\registeredcar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\registeredcar as AppRegisteredcar;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loginUser = Auth::user();

        if ($loginUser->role_id == 1){ 
            
            $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                FROM 
                                registered_car AS r 
                                JOIN users AS u
                                ON r.user_id = u.id
                                JOIN car AS c
                                ON r.car_id = c.id');}
                                    
         else{
            
            $loginUserId = $loginUser->id;
        
            $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                FROM 
                                registered_car AS r 
                                JOIN users AS u
                                ON r.user_id = u.id
                                JOIN car AS c
                                ON r.car_id = c.id
                                WHERE r.status != 0 and
                                r.status != 1 and 
                                c.user_id = '. $loginUserId);
                            
        }
    
        return view('backend.registration.index')
        ->with('registrations', $registrations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $loginUser=Auth::user();
        if($loginUser->role_id==2){
        $loginUserId = $loginUser->id;
        
        $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                            FROM 
                            registered_car AS r 
                            JOIN users AS u
                            ON r.user_id = u.id
                            JOIN car AS c
                            ON r.car_id = c.id
                            WHERE r.status != 3 and c.user_id = '. $loginUserId);}
    
        return view('backend.registration.create')
        ->with('registrations', $registrations);
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
        // $car_id = $request->input('car_id');
        // $rc = DB::select('select * from registered_car where id = ' . $car_id);
        // $price = $rc[0]->price;
        // $car_no = $rc[0]->car_no;
        // $user_id = $rc[0]->user_id;
        // $start_date = $rc[0]->start_date;
        // $end_date = $rc[0]->end_date;
        // $status = $request->input('status');
        // $updated_at = date("Y-m-d H:i:s");

        // DB::insert('insert into registered_car (user_id,car_id,price,car_no,start_date,end_date,status,updated_at) values(?,?,?,?,?,?,?,?)',[$user_id,$car_id,$price,$car_no,$start_date,$end_date,$status,$updated_at]);

        // $successmessage = "Successfully Changed!";
        // $request->session()->flash('success', $successmessage);

        // return redirect()->route('registration');
                
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
        $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
        FROM 
        registered_car AS r 
        JOIN users AS u
        ON r.user_id = u.id
        JOIN car AS c
        ON r.car_id = c.id
        WHERE r.id =  ? ',[$id]);
        return view('backend.registration.returned')
        ->with('registrations', $registrations);
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
        $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
        FROM 
        registered_car AS r 
        JOIN users AS u
        ON r.user_id = u.id
        JOIN car AS c
        ON r.car_id = c.id
        WHERE r.id =  ? ',[$id]);
        return view('backend.registration.edit')
        ->with('registrations', $registrations);
    
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

        
        $rcar = DB::select('select * from registered_car where id='.$id);
        $user_id = $rcar[0]->user_id;
        $car_id = $rcar[0]->car_id;
        $price = $rcar[0]->price;
        $car_no = $rcar[0]->car_no;
        $start_date = $rcar[0]->start_date;
        $end_date = $rcar[0]->end_date;
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");

        $reg = DB::select('SELECT email FROM 
        users AS u 
        JOIN registered_car AS r
        ON u.id = r.user_id
        WHERE u.id = '. $user_id);
        
        $comment = 'Now!!! , You can check your rgistration status and if it is confirmed, choose your collection type please!.';
            
            
            
            Mail::to($reg)->send(new RegistrationStatusMail($comment));

        DB::update('update registered_car set user_id = ?, car_id = ?, price = ?, car_no = ?, start_date = ?, end_date =?, status = ?, updated_at = ? where id = ?',[$user_id,$car_id,$price,$car_no,$start_date,$end_date,$status,$updated_at,$id]);

        $successmessage = "Successfully Changed ! ";
        $request->session()->flash('success', $successmessage);

        
        return redirect()->action(
            'backend\RegistrationController@create');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request,$id)
    {
       
        $status = $request->input('status');
        
        $obj = registeredcar::find($id);
        $obj->status = $status;
        $obj->save();

        $message = 'Success, status changed successfully ...!';
        $request->session()->flash('success', $message);

        // return redirect()->route('backend/car_type');
        // return redirect()->action(
        //     'UserController@profile', ['id' => 1]
            // );

        return redirect()->action(
            'backend\RegistrationController@index'
        );
    }
}
