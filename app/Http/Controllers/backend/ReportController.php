<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use PDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                FROM 
                                registered_car AS r 
                                JOIN users AS u
                                ON r.user_id = u.id
                                JOIN car AS c
                                ON r.car_id = c.id
                                ');

        $cars = DB::select('select * from car');
        return view('backend.report.index')
            ->with('cars', $cars)
            ->with('registrations', $registrations);
    }

    public function search($type = null)
    {
        if($type == null || $type == 0){
            
            $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                FROM 
                                registered_car AS r 
                                JOIN users AS u
                                ON r.user_id = u.id
                                JOIN car AS c
                                ON r.car_id = c.id');
        }
        else{
            
            $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                FROM 
                                registered_car AS r 
                                JOIN users AS u
                                ON r.user_id = u.id
                                JOIN car AS c
                                ON r.car_id = c.id
                                WHERE r.car_id =' .$type);

        }
        

        $cars = DB::select('select * from car');
        return view('backend.report.index')
            ->with('cars', $cars)
            ->with('registrations', $registrations);
    }
    public function excel($type = null){
        // ob means observer temporary data
                    ob_end_clean();
                    ob_start();
        
                    if($type == null || $type == 0){
                    $status = 2;
                    $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                        FROM 
                                        registered_car AS r 
                                        JOIN users AS u
                                        ON r.user_id = u.id
                                        JOIN car AS c
                                        ON r.car_id = c.id'
                                       
                                        );
                    }
                    else{
                       
                        $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                            FROM 
                                            registered_car AS r 
                                            JOIN users AS u
                                            ON r.user_id = u.id
                                            JOIN car AS c
                                            ON r.car_id = c.id
                                            WHERE  r.car_id =' .$type);
        
                    }
        
                    // foreach($registrations as $registration){
                    //     $jobs->date = Carbon::parse($jobs->date)->format('d-m-Y');
                    //     $jobs->total = $jobs->total_car_amount + $jobs->total_service_amount + $jobs->total_medication_amount + $jobs->total_investigation_amount+$jobs->package_price;
                    // }
        
                    
                    $totalAmount = 0;
                    foreach($registrations as $registration){
                        $totalAmount += $registration->total_amount;
                    }
        
                    Excel::create('regisrationreport', function($excel)use($registrations, $totalAmount) {
                        $excel->sheet('regisrationreport', function($sheet)use($registrations, $totalAmount) {
        
                            $displayArray = array(); 
                            $count = 0;
                            foreach($registrations as $registration){
                                $count++;
                                $displayArray[$registration->id]["User Name"] = $registration->user_name;
                                $displayArray[$registration->id]["Car Name"] = $registration->car_name;
                                $displayArray[$registration->id]["Start Date"] = $registration->start_date;
                                $displayArray[$registration->id]["End Date"] = $registration->end_date;
                                $displayArray[$registration->id]["1 day price"] = $registration->price;
                                $displayArray[$registration->id]["Registered at"] = $registration->created_at;
                                $displayArray[$registration->id]["Registration Price"] = $registration->total_amount;
                            }
        
                            if(count($displayArray) == 0){
                                $sheet->fromArray($displayArray);
                            }
                            else{
                                $count = $count +2;
                                $sheet->cells('A1:G1', function($cells) {
                                    $cells->setBackground('#1976d3');
                                    $cells->setFontSize(13);
                                    $cells->setFontColor('#ffffff');
                                });
                                $sheet->fromArray($displayArray);
        
                                $appendedRow = array();
        
                                $appendedRow[0] = "";
                                $appendedRow[1] = "";
                                $appendedRow[2] = "";
                                $appendedRow[3] = "";
                                $appendedRow[4] = "";
                                $appendedRow[5] = "Grand Total";
                                $appendedRow[6] = $totalAmount;                                        
        
                                $sheet->appendRow(
                                    $appendedRow
                                );
                                $sheet->cells('A'.$count.':G'.$count, function($cells) {
                                    $cells->setBackground('#1976d3');
                                    $cells->setFontSize(13);
                                    $cells->setFontColor('#ffffff');
                                });
                            }
                        });
                    })
                        ->download('xls');
                    ob_flush();
                    // flush means clean
                    return Redirect();
                
            }
        
            public function pdfPreview($type = null)
            {
                if($type == null || $type == 0){
                    
                    $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                        FROM 
                                        registered_car AS r 
                                        JOIN users AS u
                                        ON r.user_id = u.id
                                        JOIN car AS c
                                        ON r.car_id = c.id
                                        '
                                        );
                    }
                else{
                    
                    $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                        FROM 
                                        registered_car AS r 
                                        JOIN users AS u
                                        ON r.user_id = u.id
                                        JOIN car AS c
                                        ON r.car_id = c.id
                                        WHERE  r.car_id =' .$type);
        
                }
                      
            //   $users = User::orderBy('id','asc')->get();
            // $users = User::all();
              $view = \View::make('backend.report.pdf_content', ['registratons'=>$registrations]);
              $html_content = $view->render();
              PDF::SetTitle("List of registered-cars");
              PDF::AddPage();
        
            // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
            // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
            
              PDF::writeHTML($html_content, true, false, true, false, '');
              // D is the change of these two functions. Including D parameter will avoid 
              // loading PDF in browser and allows downloading directly
              PDF::Output('userlist.pdf');
        
            }
        
            public function pdfExport($type = null)
            {
                if($type == null || $type == 0){
                    
                    $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                        FROM 
                                        registered_car AS r 
                                        JOIN users AS u
                                        ON r.user_id = u.id
                                        JOIN car AS c
                                        ON r.car_id = c.id');
                    }
                else{
                    
                    $registrations = DB::select('SELECT r.*,u.name AS user_name,c.name AS car_name 
                                        FROM 
                                        registered_car AS r 
                                        JOIN users AS u
                                        ON r.user_id = u.id
                                        JOIN car AS c
                                        ON r.car_id = c.id
                                        WHERE  r.car_id =' .$type);
        
                }
                      
            //   $users = User::orderBy('id','asc')->get();
            // $users = User::all();
            $view = \View::make('backend.report.pdf_content', ['registratons'=>$registrations]);
              $html_content = $view->render();
              PDF::SetTitle("List of users");
              PDF::AddPage();
        
            // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
            // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
            
              PDF::writeHTML($html_content, true, false, true, false, '');
              // D is the change of these two functions. Including D parameter will avoid 
              // loading PDF in browser and allows downloading directly
                PDF::Output('userlist.pdf', 'D');   
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
