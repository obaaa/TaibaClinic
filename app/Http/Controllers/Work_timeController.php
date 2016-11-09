<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Day;
use App\Shift;
use App\Divisions_time;
use App\Work_time;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class Work_timeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $work_times = Work_time::all();
  		return view('settings.work_time.index', compact('work_times',$work_times));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $days = Day::all();
      $shifts = Shift::all();
      $divisions_times = Divisions_time::all();
      $work_times = Work_time::all();
  		return view('settings.work_time.create', compact('days',$days,'shifts',$shifts,'divisions_times',$divisions_times,'work_times',$work_times));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $work_time = new Work_time;
      $work_time->day_id = Input::get('day_id');
      $work_time->shift_id = Input::get('shift_id');
      $work_time->divisions_times_start_id = Input::get('divisions_times_start_id');
      $work_time->divisions_times_end_id = Input::get('divisions_times_end_id');
  		$work_time->save();

  		Session::flash('message', 'You have successfully added Checked');
  		return Redirect::to('work_times');
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
      $days = Day::all();
      $shifts = Shift::all();
      $divisions_times = Divisions_time::all();
      $work_time = Work_time::find($id);
      return view('settings.work_time.edit', compact(
      'days',$days,
      'shifts',$shifts,
      'divisions_times',$divisions_times,
      'work_time',$work_time));

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
      $work_time = Work_time::find($id);
      $work_time->day_id = Input::get('day_id');
      $work_time->shift_id = Input::get('shift_id');
      $work_time->divisions_times_start_id = Input::get('divisions_times_start_id');
      $work_time->divisions_times_end_id = Input::get('divisions_times_end_id');
      $work_time->save();

      // redirect
      Session::flash('message', 'You have successfully updated Work Time');
      return Redirect::to('work_times');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  				$work_time = Work_time::find($id);
  		        $work_time->delete();
  		        // redirect
  		        Session::flash('message', 'You have successfully deleted Work Time');
  		        return Redirect::to('work_times');
  	}
}
