<?php

namespace App\Http\Controllers\backend;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\car;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $loginUser = Auth::user();

        if ($loginUser->role_id == 1) {
            
       
        // $objs= car::where('deleted_at', NULL)->get();
        $objs=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name,u.name AS user_name 
        FROM 
        car AS c 
        JOIN brand AS b
        ON c.brand_id = b.id
        JOIN cartype AS ct
        ON c.cartype_id = ct.id
        JoIN users As u
        ON c.user_id = u.id
        where c.deleted_at Is Null');
        }
        else{
            
            $loginUserId = $loginUser->id;
            

            // $objs= car::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name,u.name AS user_name
            FROM 
            car AS c 
            JOIN brand AS b
            ON c.brand_id = b.id
            JOIN cartype AS ct
            ON c.cartype_id = ct.id
            JoIN users As u
            ON c.user_id = u.id
            WHERE c.user_id = '.$loginUserId.' AND c.deleted_at Is Null' );
        }

        
        
        
       return view('backend.car.index')
       
        ->with('objs',$objs);
    }
    


    
  
                       
     
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $loginUser = Auth::user();
        $loginUserId = $loginUser->id;

        $cartypes = DB::select('select * from cartype where status = 1');
        $brands = DB::select('select * from brand where status = 1');
        $users=DB::select('select * from users where role_id="2" and id='.$loginUserId);
        return view('backend.car.create')
            
            ->with('cartypes', $cartypes)
            ->with('users', $users)
            ->with('brands',$brands);
 
        
        
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
            'name' => 'required',
            'price' => 'required|max:2147483647|integer',
            'status' => 'required',
            'cartype_id'=> 'required',
            'brand_id' => 'required',
            'color' => 'required',
            'wheels'=> 'required',
            'doors' => 'required',
            'mile_list'=> 'required|integer',
            'model' => 'required|integer',
            'seat' => 'required',
            'transmission' => 'required',
            'grade' => 'required',
            'description' => 'required',
            'car_no' => 'required|unique:car',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $loginUser = Auth::user();
        $user_id = $loginUser->id;
        $name = $request->input('name');
        $brand_id = $request->input('brand_id');
        $cartype_id = $request->input('cartype_id');
        $color = $request->input('color');
        $wheels = $request->input('wheels');
        $doors = $request->input('doors');
        $mile_list = $request->input('mile_list');
        $model = $request->input('model');
        $seat = $request->input('seat');
        $transmission = $request->input('transmission');
        $fuel = $request->input('fuel');
        
        $grade = $request->input('grade');
        $price = $request->input('price');
        $description = $request->input('description');
        

        try{
    
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $image_file = "/images/" . $new_name;
            
            $status = $request->input('status');
            $car_no = $request->input('car_no');

            $created_at = date("Y-m-d H:i:s");

            $cartypes=DB::select('select * from cartype where id='.$cartype_id);
            $brands=DB::select('select * from cartype where id='.$brand_id);
            DB::insert('insert into car (name,brand_id,cartype_id,user_id,color,wheels,doors,mile_list,model,seat,transmission,fuel,grade,price,description,image,status,car_no,created_at) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
                        [$name,$brand_id,$cartype_id,$user_id,$color,$wheels,$doors,$mile_list,$model,$seat,$transmission,$fuel,$grade,$price,$description,$image_file, $status,$car_no,$created_at]);

            $smessage = 'Success, car created successfully ...!';
            $request->session()->flash('success', $smessage);

             // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'backend\CarController@index'
            )
                ->with('cartypes', $cartypes)
                ->with('brands',$brands);
                    }
        catch(Exception $e){
            
            $smessage = 'Fail, Error in car creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\CarController@index'
            );
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
         // $objs = DB::select('select * from cars where id = ?', [$id]);
         
         $obj = DB::table('car')->where('id', $id)->first();
         $objs_car_type =DB::select('select * from cartype');
         $objs_brand = DB::select('select * from brand');
         return view('backend.car.edit', ['obj' => $obj,'objs_car_type'=>$objs_car_type,'objs_brand'=>$objs_brand]);
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
        $this->validate($request, [
           
            'price' => 'required|integer|max:214748364789',
            'status' => 'required',
            
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $name = $request->input('name');
        $color = $request->input('color');
        $wheels = $request->input('wheels');
        $doors = $request->input('doors');
        $mile_list = $request->input('mile_list');
        $model = $request->input('model');
        $seat = $request->input('seat');
        $transmission = $request->input('transmission');
        $fuel = $request->input('fuel');
        $grade = $request->input('grade');
        $price = $request->input('price');
        $status = $request->input('status');
        $description = $request->input('description');
        $updated_at = date("Y-m-d H:i:s");
        

        try{
            
            
            if($image = $request->file('image')){
               
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                $image_file = "/images/" . $new_name;
    
                DB::update('update car set name = ?, color = ?, wheels = ?, doors = ?, mile_list = ?, model = ?, seat = ?, transmission = ?, fuel = ?, grade = ?, price = ?,  image = ?, status = ?, description = ?, updated_at = ? where id = ?', [$name,$color,$wheels,$doors,$mile_list,$model,$seat,$transmission,$fuel,$grade,$price,$image_file,$status,$description,$updated_at,$id]);
            }
            else{
                DB::update('update car set name = ?, color = ?, wheels = ?, doors = ?, mile_list = ?, model = ?, seat = ?, transmission = ?, fuel = ?, grade = ?, price = ?,  status = ?, description = ?, updated_at = ? where id = ?', [$name,$color,$wheels,$doors,$mile_list,$model,$seat,$transmission,$fuel,$grade,$price,$status,$description,$updated_at,$id]);
            }
           
            $smessage = 'Success, car updated successfully ...!';
            $request->session()->flash('success', $smessage);

            // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'backend\CarController@index'
            );
        }
            catch(Exception $e){
            
            $smessage = 'Fail, Error in car updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\CarController@index'
            );
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $obj = car::find($id);
        
        // Very Dangerous - Fully Delete Action
        // If no need to destory permanently, u should not use it
        // System will crash in other parts
        // CarType::destroy($id);

        // $status = 0;
        // $updated_at = date("Y-m-d H:i:s");
        // DB::update('update car_type set status = ?, updated_at = ? where id = ?', [$status, $updated_at, $id]);

        // https://laravel.com/docs/5.8/eloquent#soft-deleting

        // $notes = CarType::withTrashed()->get();
        // $obj = CarType::withTrashed()
        //         ->where('id', $id)
        //         ->get();
        // $post = App\Post::withTrashed()->whereId(2)->restore();

        $obj->delete();
        if ($obj->trashed()) {            
            $message = 'Success, ' . $obj->name .' deleted successfully ...!';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\CarController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->name .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\CarController@index'
            );
        }
    }
}
