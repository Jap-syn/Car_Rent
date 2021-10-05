<?php

namespace App\Http\Controllers\frontend;
use DB;
use Auth;
use App\car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
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

        if (!($loginUser)){
            $status=1;
            $objss= car::where('deleted_at', NULL)->get();
           $objs=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name 
            FROM 
            car AS c 
            JOIN brand AS b
            ON c.brand_id = b.id
            JOIN cartype AS ct
            ON c.cartype_id = ct.id
            where c.status = ' .$status.' AND c.deleted_at Is Null');
           

        }
        
        else{
            $loginUser->role_id==3;
            
            $status = 1;

            $objss= car::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name 
            FROM 
            car AS c 
            JOIN brand AS b
            ON c.brand_id = b.id
            JOIN cartype AS ct
            ON c.cartype_id = ct.id
            WHERE c.status = ' .$status.' AND c.deleted_at Is Null');
        }

                $feed_count_raw = DB::select('select count(id) AS feed_count from feedback');
    
                if (isset($feed_count_raw) && count($feed_count_raw)>0) {
                    $feed_count = $feed_count_raw[0]->feed_count;
                } else {
                    $feed_count = 0;
                }

                $car_count_raws = DB::select('select count(id) AS car_count from car');
    
                if (isset($car_count_raws) && count($car_count_raws)>0) {
                    $car_count = $car_count_raws[0]->car_count;
                } else {
                    $car_count = 0;
                }
               
                // Start - Searching User Count except Adimin (Role 2) Process
                $user_count_raw = DB::select('select count(id) AS user_count from users');
    
                if (isset($user_count_raw) && count($user_count_raw)>0) {
                    $user_count = $user_count_raw[0]->user_count;
                } else {
                    $user_count = 0;
                }
                   
        
       return view('/welcome')
       ->with('objss',$objss)
       ->with('objs',$objs)
       ->with('feed_count',$feed_count)
       ->with('car_count',$car_count)
       ->with('user_count',$user_count);

     
    }
   
    public function cars()
    {
        //
        $loginUser = Auth::user();

        if (!($loginUser)){
            $status=1;
            $objs= car::where('deleted_at', NULL)->get();
           $objs=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name 
            FROM 
            car AS c 
            JOIN brand AS b
            ON c.brand_id = b.id
            JOIN cartype AS ct
            ON c.cartype_id = ct.id
            WHERE c.status = ' .$status.' AND c.deleted_at Is Null');
           

        }
        
        else{
            $loginUser->role_id==3;
            
            $status = 1;

            $objs= car::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name 
            FROM 
            car AS c 
            JOIN brand AS b
            ON c.brand_id = b.id
            JOIN cartype AS ct
            ON c.cartype_id = ct.id
            WHERE c.status = ' .$status.' AND c.deleted_at Is Null');
        }

        
        
        
       return view('frontend/cars')
       
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
          // $objs = DB::select('select * from cars where id = ?', [$id]);
        //   $obj = DB::table('car')->where('id', $id)->first();
          $objs = DB::select('SELECT c.* ,u.name as user_name
                            FROM car AS c
                            JOIN users AS u
                            ON c.user_id = u.id 
                            WHERE c.id =  ? ',[$id]);
          $obj=DB::select('SELECT c.*,b.name AS brand_name,ct.name AS cartype_name 
          FROM 
          car AS c 
          JOIN brand AS b
          ON c.brand_id = b.id
          JOIN cartype AS ct
          ON c.cartype_id = ct.id');
         
            // dd($objs[0]=$id);
          $objs_car_type = DB::select('select * from cartype');
          $objs_brand = DB::select('select * from brand');
          
        
          $subs = DB::select('SELECT f.*,u.name AS user_name,u.image AS user_image,c.name AS car_name 
          FROM 
          feedback AS f 
          JOIN users AS u
          ON f.user_id = u.id
          JOIN car AS c
          ON f.car_id = c.id
          WHERE c.id = '.$id);

           $feed_count_raw = DB::select('select count(id) AS feed_count from feedback where car_id ='.$id);
    
                if (isset($feed_count_raw) && count($feed_count_raw)>0) {
                    $feed_count = $feed_count_raw[0]->feed_count;
                } else {
                    $feed_count = 0;
                }

            return view('frontend.cardetail', ['obj'=>$obj,'objs' => $objs,'objs_car_type'=>$objs_car_type,'objs_brand'=>$objs_brand,'subs'=>$subs,'feed_count'=>$feed_count]);
  
         
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
