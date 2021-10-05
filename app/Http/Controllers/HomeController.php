<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //     $cars = DB::select('select * from car');
    //     return view('home')
    //         ->with('cars', $cars);
    //
    $loginUser = Auth::user();

        if ($loginUser->role_id == 1) {
            $objs=DB::select('select * from users');
        }
        else{
            $loginUserId = $loginUser->id;
            $objs=DB::select('select * from users where id='.$loginUserId);

        }
        return view('home')
        ->with('objs', $objs);
 }
 public function edit($id)
    {
        
        $user = DB::select('select * from users where id = ?',[$id]);
        
        // General knowledge about the data retrieve and SQL Injection Case
        // the only difference here is the syntax. Yes, a DB::select doesn't protect against SQL injection. 
        // But SQL injection is only a risk when you pass in user input. 
        // For example this is vulnerable to SQL injection:
        // DB::select('SELECT * FROM users WHERE name = "'.Input::get('name').'"');
        // But Whereas this is not with DB::table case:
        // DB::table('users')->where('name', Input::get('name'))->get();
        // But also this isn't: (Using bindings "manually")
        // DB::select('SELECT * FROM users WHERE name = ?', array(Input::get('name')));
        
        //$user = DB::table('users')->where('id', $id)->get();
        // get() method will return as array with many sub child and you need to call as $user[0]
        $user2 = DB::table('users')->where('id', $id)->first();
        
        return view('backend.user.edit')
        ->with('user',$user)
        ->with('user2',$user2);
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

        $this->validate($request,[
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:users,email,'. $id .'',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
           
            ]);

        
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $phone = $request->input('phone');
        $address = $request->input('address');
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
                
        
        try{
            
            
            if($image = $request->file('image')){
               
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                $image_file = "/images/" . $new_name;
                DB::update('update users set  email = ?,  password = ?, phone = ?, address = ?, image = ?, status = ?, updated_at = ? where id = ?', [$email,$password,$phone,$address,$image_file,$status,$updated_at,$id]);
            }
            else{
                DB::update('update users set  email = ?,  password = ?, phone = ?, address = ?, status = ?, updated_at = ? where id = ?', [$email,$password,$phone,$address,$status,$updated_at,$id]);
            }
           
            $smessage = 'Success, user updated successfully ...!';
            $request->session()->flash('success', $smessage);

            // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'HomeController@index'
            );
        }
            catch(Exception $e){
            
            $smessage = 'Fail, Error in user updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'HomeController@index'
            );
        }

 }

   

}
