<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Work_time;
use App\Day;
use App\UserRole;
use App\User;
use App\Shift;

use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;


class VisitController extends Controller
{
    public function visit_check(Request $request)
    {
        
        $patient = Input::get('patient');
        $visit_date = Input::get('visit_date');
        $doctor = Input::get('doctor');
        $shift_id = Input::get('Shift_id');
        
        if(!empty($patient) && !empty($visit_date) && !empty($shift_id)){
            
              $date_stamp = strtotime(date('Y-m-d', strtotime($visit_date)));
              $stamp = date('l', $date_stamp);
            
              
            
                $day = Day::where('day_name','=',$stamp)->first();
            
                $re = Work_time::where('shift_id','=',$shift_id)->where('day_id','=',$day->id)->first();
                

                if (count($re) != 0){
                    $users = User::all();
                    $work_time_id = $re->id;
                    return view('visit.by_patient', compact('patient',$patient,'visit_date',$visit_date,'stamp',$stamp,'work_time_id',$work_time_id));
                }else{
                    Session::flash('message', 'Date or Shift is not available');
                    return Redirect::to('home');
                }
            


            
//                    
//                }
           } elseif(empty($patient) && empty($visit_date) && !empty($doctor)) {
            echo "okok";
        }                  

    }
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
