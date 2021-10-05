<?php

namespace App\Http\Controllers\backend;
use App\User;
use DB;
use Mail;
use App\Mail\PasswordMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.user.create');
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
        $this->validate($request, [
            'name' => 'required|max:225',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
          
          
          
            
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        // try{
    
        //     $image = $request->file('image');
        //     $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $new_name);
        //     $image_file = "/images/" . $new_name;
      
        
            // if($files = $request->file('image')){
            //     $image = $files->getClientOriginalName();
                
            // }
            // else{
            //     $image = "";
            // }

            $phone = $request->input('phone');
            $address = $request->input('address');
            $gender = $request->input('gender');
            $role_id = $request->input('role_id');
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");
            
            $comment = ' aaaaaaaa ';    
            
            
            
            Mail::to($email)->send(new PasswordMail($comment,$email));
           
            DB::insert('insert into users (name,email,password,phone,address,gender,role_id,status,created_at) values(?,?,?,?,?,?,?,?,?)', 
            [$name,$email,$password,$phone,$address,$gender,$role_id,$status,$created_at]);


           
            // email
            
        //     $to_email = $to = $request->input('email');
        //     // $to_email_name = $from = $request->input('email_name');
            
        //     $send_message = $html = $request->input('message');
        //     $plain = "";
        //     $html = "your pass is cccc";
        //     $fromEmail = 'xxx@gmail.com';
        //     $fromName = 'Digital Car';
        //     Mail::raw([], function($message) use($html, $plain, $to,$fromEmail, $fromName){
        //     $message->from($fromEmail, $fromName);
        //     $message->to($to);
            
        //     $message->setBody($html, 'text/html' ); // dont miss the '<html></html>' if the email dont contains it to decrease your spam score !!
        //     $message->addPart($plain, 'text/plain');
        // });        
        
        
        
                $message = 'Success, user registered and email sent successfully ...!';
                $request->session()->flash('success', $message);
    
                // return redirect()->route('backend/car_type');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                    // );
                    return redirect()->route('home');
                
            
               
       
            
      
      

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
