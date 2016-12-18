<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Work_time;
use App\Day;
use App\UserRole;
use App\User;
use App\Shift;
use App\Checked;
use App\Patient;
use App\Visit;
use App\Divisions_time;
use App\Add_visit;
use App\Lab;
use Image;

use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;


  class LabController extends Controller
  {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $labs = Lab::orderBy('created_at', 'desc')->paginate(20);

      return view('lab.index', ['labs' => $labs]);

    }

    public function lab_update(Request $request)
    {
      $input = $request->all();
      $lab_status = Input::get('lab_status');
      $lab_id = Input::get('lab_id');

      $lab = Lab::find($lab_id);
      $lab->lab_status = $lab_status;
      $lab->save();

      $visit = Visit::find($lab->visit_id);
      $labs = Lab::where('visit_id','=',$visit->id)->get();
      $patient = Patient::where('id','=',$visit->patient_id)->first();
      return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient, 'labs' => $labs]);

    }

    public function add_to_lab(Request $request)
    {

      $input = $request->all();
      $lab_type = Input::get('lab_type');
      $lab_description = Input::get('lab_description');
      $visit_id = Input::get('visit_id');

      $new_lab = new Lab;
      $new_lab->lab_type = $lab_type;
      $new_lab->lab_description = $lab_description;
      $new_lab->visit_id = $visit_id;
      $new_lab->lab_status = "In wait";
      $new_lab->save();

      $visit = Visit::find($visit_id);
      $labs = Lab::where('visit_id','=',$visit->id)->get();
      $patient = Patient::where('id','=',$visit->patient_id)->first();
      Session::flash('message', 'successfully');
      return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient]);
    }


    public function destroy($id)
    {
      $lab = Lab::find($id);
      $lab->delete();
      // redirect
      Session::flash('message', 'You have successfully deleted lab');
      return Redirect::to('lab');
    }
}
