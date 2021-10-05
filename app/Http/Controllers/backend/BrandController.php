<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\brand;
use App\log;
use Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $objs = brand::where('deleted_at', NULL)     
        ->get();


        
        return view('backend.brand.index')
            ->with('nandars', $objs);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.brand.create');
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
            'status' => 'required'
            
        ]);
        try{
            
     
        $name = $request->input('name');
        $status = $request->input('status');
        
        $created_at = date("Y-m-d H:i:s");

           
            $new_obj = new brand();
        
           
            $new_obj->name = $name;
            $new_obj->status = $status;
            $new_obj->created_at = $created_at;
            $new_obj->save();
        
            $loginUser = Auth::user();
            $loginUserName = $loginUser->name;

            $log =$loginUserName ." created ".$name." brand at ". $created_at;

            $new = new log();
            $new->log = $log;
            $new->status = 1;
            $new->save();
                $message = 'Success, brand created successfully ...!';
                $request->session()->flash('success', $message);
    
                // return redirect()->route('backend/car_type');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                    // );
    
                return redirect()->action(
                    'backend\BrandController@index'
                );
            
            
    
        }
        catch(Exception $e){
            
            $smessage = 'Fail, Error in brand creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\BrandController@index'
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
        $obj = DB::table('brand')->where('id', $id)->first();
        return view('backend.brand.edit', ['obj' => $obj]);
    
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
            
            'status' => 'required',
            
        ]);

        $name = $request->input('name');
        $status = $request->input('status');
        
        $updated_at = date("Y-m-d H:i:s");

        try{
            
            $new_obj = brand::find($id);

            $old_name = $new_obj->name;
            $old_status = $new_obj->status;

            $new_obj->name = $name;
            $new_obj->status = $status;
            $new_obj->updated_at = $updated_at;
            $new_obj->save();
            
            $loginUser = Auth::user();
            $loginUserName = $loginUser->name;
            $log = $loginUserName ." updated ";
            $flag = 1;

            if($old_name != $name){
               $log .= "brand ".$old_name." to brand ".$name.", "; 
               $flag = 2;
            }
            if($old_status != $status){
                $log .= "status ".$old_status." to status ".$status; 
                $flag = 2;
             }
            $log .=" at ".$updated_at;
            
            if($flag == 2){
            $new = new log();
            $new->log = $log;
            $new->status = 2;
            $new->save();
            }
                $message = 'Success, brand updated successfully ...!';
                $request->session()->flash('success', $message);
    
                // return redirect()->route('backend/car_type');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                    // );
    
                return redirect()->action(
                    'backend\BrandController@index'
                );
            
            
    
        }
        catch(Exception $e){
            
            $smessage = 'Fail, Error in brand updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\BrandController@index'
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
        $obj = brand::find($id);
        $delete_time = date("Y-m-d H:i:s");
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

            $loginUser = Auth::user();
            $loginUserName = $loginUser->name;

            $log =$loginUserName ." deleted ".$obj->name." brand at ". $delete_time;

            $new = new log();
            $new->log = $log;
            $new->status = 3;
            $new->save();

            return redirect()->action(
                'backend\BrandController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->name .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\BrandController@index'
            );
        }
    }
    }

