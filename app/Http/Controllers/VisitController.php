<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Work_time;
use App\Day;
use App\UserRole;

use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;


class VisitController extends Controller
{
    public function visit_check(Request $request)
    {
        
//      $input = $request->all();
        $patient = Input::get('patient');
        $visit_date = Input::get('visit_date');
        $doctor = Input::get('doctor');
        if(!empty($patient) && !empty($visit_date)){
           
              $visit_date = Input::get('visit_date');


              $date_stamp = strtotime(date('Y-m-d', strtotime($visit_date)));
              $stamp = date('l', $date_stamp);


              $work_times = Work_time::all();
              foreach ($work_times as $value) {

                $day = Day::where('id','=',$value->day_id)->first();
                $day_name = $day->day_name;
                if ($stamp == $day_name) {
                    
                   

			return view('visit.by_patient', compact('patient',$patient,'visit_date',$visit_date,'stamp',$stamp));
                } else {
                  Session::flash('message', 'Is not a working day');
                    return Redirect::to('home');
                }
              }
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
