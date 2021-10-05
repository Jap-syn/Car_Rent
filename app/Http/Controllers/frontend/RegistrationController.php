<?php

namespace App\Http\Controllers\frontend;
use Auth;
use DB;
use Carbon\Carbon;
use registeredcar;
use Mail;
use App\Mail\RegistrationMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        
            $loginUserId = $loginUser->id;
            
       
            $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                FROM 
                                registered_car AS r 
                                JOIN users AS u
                                ON r.user_id = u.id
                                JOIN car AS c
                                ON r.car_id = c.id
                                WHERE r.user_id = '. $loginUserId);
            
           
    
        return view('frontend.registration.index')
            
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
        
        $car = DB::select('select * from car');
        
        return view('frontend.registration.create')
            ->with('car', $car);
        
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
            
            
            'start_date' => 'required|after:today|before:end_date',
            'end_date' => 'required|after:start_date',
            
            
        ]);
        $loginUser = Auth::user();

        // Checking already login or not
        //if(count(array($loginUser))>0){
        if(!empty($loginUser)) {

            $car = DB::select('select * from car');

            $car_id = $request->input('car_id');
            $user_id = $loginUser->id;
            $start_date = Carbon::parse($request->input('start_date'));
            $end_date = Carbon::parse($request->input('end_date'));
    // $start_date=date("Y-m-d");
            // $end_date=date("Y-m-d");
           
            // Checking already registered this car or not
            $registeredFlag = DB::select('select * from registered_car where user_id = ?  AND car_id = ? AND start_date = ? AND end_date = ?' ,[$user_id,$car_id,$start_date,$end_date] );
            if(!empty($registeredFlag)) {
            //if (count(array($registeredFlag))>0) {
                
                $successmessage = 'Error, you have already registered to this car !';
                $request->session()->flash('success', $successmessage);

                return redirect()->route('frontend/registration/create')
                ->with('car', $car);
            }
            elseif(!empty($loginUser)){
                $car = DB::select('select * from car');

                $car_id = $request->input('car_id');
                
                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));
                $status = 2;
        // $start_date=date("Y-m-d");
                // $end_date=date("Y-m-d");
               
                // Checking already registered this car or not
                $registeredFlag1 = DB::select('select * from registered_car where car_id = ? AND start_date = ? AND end_date = ? AND status = ?' ,[$car_id,$start_date,$end_date,$status] );
                
    
                if(!empty($registeredFlag1)) {
                //if (count(array($registeredFlag))>0) {
                    
                    $successmessage = 'Error, these dates already registered to this car !';
                    $request->session()->flash('success', $successmessage);
    
                    return redirect()->route('frontend/registration/create')
                    ->with('car', $car);
                }
               

            
            else{

                // Getting Car detail information to insert car price as history
                $car = DB::select('select * from car where id = ' . $car_id);
                $price = $car[0]->price;
                $car_no = $car[0]->car_no;
                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));
                $payment = $request->input('payment');
                $created_at = date("Y-m-d H:i:s");
                
         
                
              

                // calculate the duration and total_amount depend on user's date
                $duration = $end_date->diffInDays($start_date);
                $total_amount = $price * $duration;


                
                DB::insert('insert into registered_car (user_id,car_id,price,car_no,start_date,end_date,duration,payment,total_amount,created_at) values(?,?,?,?,?,?,?,?,?,?)',[$user_id,$car_id, $price,$car_no,$start_date,$end_date,$duration,$payment,$total_amount,$created_at]);
                $loginUser=Auth::user();
                $loginUserEmail = $loginUser->email;
                $loginUserName = $loginUser->name;
                $comment = '* Plx wait a moment until receiving next mail * , (You can check your result when the car owner choose the status.)';
    
    
    
                Mail::to($loginUserEmail)->send(new RegistrationMail($comment,$loginUserName));
               
                $successmessage = "Success, making reservation successfully !";
                $request->session()->flash('success', $successmessage);
               
                return redirect()->route('registration')
                ->with('car', $car);
                
            } 

        }
    }
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
        $registration = DB::table('registered_car')->where('id', $id)->first();
        return view('frontend.registration.allocation',['registration'=>$registration]);

      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $car = DB::select('select * from car where id='.$id);
        
        return view('frontend.registration.create')
            ->with('car', $car);
        
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
       
            $collect_type = $request->input('collect_type');
            $updated_at = date("Y-m-d H:i:s");
    
            
            DB::update('update registered_car set collect_type = ?, updated_at = ? where id = ?',[$collect_type,$updated_at,$id]);
            $successmessage = "Rental Process is Successfully finished!.Now, you can collect with your choice from owner! ! ";
            $request->session()->flash('success', $successmessage);
    
            
            return redirect()->action(
            'frontend\RegistrationController@index');
          
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
