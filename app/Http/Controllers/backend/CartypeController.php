<?php

namespace App\Http\Controllers\backend;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cartype;
class CartypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = cartype::where('deleted_at', NULL)
                       
        ->get();

      return view('backend.cartype.index')
      ->with('objs', $objs);


      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.cartype.create');
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

           
            $new_obj = new cartype();
        
           
            $new_obj->name = $name;
            $new_obj->status = $status;
            $new_obj->created_at = $created_at;
            $new_obj->save();
        
                $message = 'Success, car type created successfully ...!';
                $request->session()->flash('success', $message);
    
                // return redirect()->route('backend/car_type');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                    // );
    
                return redirect()->action(
                    'backend\CartypeController@index'
                );
            
            
    
        }
        catch(Exception $e){
            
            $smessage = 'Fail, Error in cartype creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\CartypeController@index'
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
        $obj = DB::table('cartype')->where('id', $id)->first();
        return view('backend.cartype.edit', ['obj' => $obj]);
    
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
            
            $new_obj = cartype::find($id);
            $new_obj->name = $name;
            $new_obj->status = $status;
            $new_obj->updated_at = $updated_at;
            $new_obj->save();
        
                $message = 'Success, car type updated successfully ...!';
                $request->session()->flash('success', $message);
    
                // return redirect()->route('backend/car_type');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                    // );
    
                return redirect()->action(
                    'backend\CartypeController@index'
                );
            
            
    
        }
        catch(Exception $e){
            
            $smessage = 'Fail, Error in cartype updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\CartypeController@index'
            );
      
    }
    }
    /**
     * Remove the specified resource from storage.    *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $obj = cartype::find($id);
        
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
                'backend\CartypeController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->name .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\CartypeController@index'
            );
        }
    }
}
